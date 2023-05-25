<?php

include("config/db.php");
include("classes/DB.php");
include("classes/Penyanyi.php");
include("classes/Genre.php");
include("classes/Musik.php");
include("classes/Template.php");

// open db
$musik = new Musik($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$musik->open();
$updateImg = new Musik($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$updateImg->open();

$penyanyi = new Penyanyi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$penyanyi->open();

$genre = new Genre($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$genre->open();

$genre->getGenre();
$penyanyi->getPenyanyi();

$dataPenyanyi = null;
$dataGenre = null;
$coverUpdate = "";
$judulUpdate = "";
$rilisUpdate = "";
$durasiUpdate = "";
$penyanyiUpdate = "";
$genreUpdate = "";

$tpl = new Template("templates/skinForm.html");
// if user clicked submit btn
if (!isset($_GET['edit'])) {
    if (isset($_POST['btn-submit'])) {
        // call insert method
        if($musik->addData($_POST, $_FILES)>0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
                ";
        }else {
            echo "
                <script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'formMusik.php';
                </script>
                ";
        }
    }
    // fetch all records from penyanyi
    while ($row =  $penyanyi->getResult()) {
        // create input select option
        $dataPenyanyi .= "
            <option value='". $row['id_penyanyi'] ."'>". $row['nama_penyanyi']."</option>
        ";
    }

    while ($row = $genre->getResult()) {
        // create input select option
        $dataGenre .= "
            <option value='". $row['id_genre'] ."'>". $row['nama_genre'] ."</option>
        ";
    }
    $title = "Tambah Musik";
    $tpl->replace("DATA_TITLE", $title);

}else if (isset($_GET['edit'])) {
    $idPrev = $_GET['edit'];
    $updateImg->getMusik();
    $updateImg->getMusikById($idPrev);
    $updtImg = $updateImg->getResult();
    $imgNew = $updtImg['cover'];
    
    if (isset($_POST['btn-submit'])) {
        if($musik->updateData($idPrev, $_POST, $_FILES, $imgNew)>0){
            echo "
            <script>
            alert('Data berhasil diubah!');
            document.location.href = 'index.php';
            </script>
            ";
        }else {
            echo "
            <script>
            alert('Data Gagal diubah!');
            document.location.href = 'formMusik.php';
            </script>
            ";
        }
    }
    $musik->getMusikById($idPrev);
    $row = $musik->getResult();
    $coverUpdate = $row['cover'];
    $judulUpdate = $row['judul'];
    $rilisUpdate = $row['tahun_rilis'];
    $durasiUpdate = $row['durasi'];
    $penyanyiUpdate = $row['id_penyanyi'];
    $genreUpdate = $row['id_genre'];

    // fetch all records from penyanyi
    $penyanyi->getPenyanyi();
    while ($row = $penyanyi->getResult()) {
        // create input select option
        $selected = ($row['id_penyanyi'] == $penyanyiUpdate) ? 'selected' : '';
        $dataPenyanyi .= "<option value='". $row['id_penyanyi'] ."' $selected>". $row['nama_penyanyi']."</option>";
    }

    $genre->getGenre();
    while ($row = $genre->getResult()) {
        // create input select option
        $selected = ($row['id_genre'] == $genreUpdate) ? 'selected' : '';
        $dataGenre .= "<option value='". $row['id_genre'] ."' $selected>". $row['nama_genre'] ."</option>";
    }

   
    $title = "Update Musik";
    $tpl->replace("DATA_TITLE", $title);
        

}


// fetch all records from penyanyi

$musik->close();
$genre->close();
$penyanyi->close();

$tpl->replace("DATA_JUDUL", $judulUpdate);
$tpl->replace("DATA_TAHUN", $rilisUpdate);
$tpl->replace("DATA_DURASI", $durasiUpdate);
$tpl->replace("DATA_COVER", $coverUpdate);
$tpl->replace("DATA_PENYANYI", $dataPenyanyi);
$tpl->replace("DATA_GENRE", $dataGenre);

$tpl->write();

?>