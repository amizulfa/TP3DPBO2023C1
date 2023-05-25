<?php

include("config/db.php");
include("classes/DB.php");
include("classes/Penyanyi.php");
include("classes/Template.php");

// open db
$penyanyi = new Penyanyi($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$penyanyi->open();

$dataNavbar = null;
$dataHeader = null;
$dataContent = null;
$dataForm = null;
$title = "Penyanyi";

// add genre
if (!isset($_GET['id_update'], $_GET['id_delete'])) {
    // creating form
    $inputTitle = "Tambah Penyanyi";
    $dataForm = "
            <div class='mb-3'>
              <label for='nama_penyanyi' class='form-label'>Nama Penyanyi</label>
              <input type='text' class='form-control' id='nama_penyanyi' name='nama_penyanyi' placeholder='Masukan Nama Penyanyi...' required />
            </div>
            <div class='float-end'>
                <button type='submit' class='btn btn-custom' name='btn-submit' id='btn-submit'>Submit</button>
                <button type='reset' class='btn btn-secondary' name='btn-reset' id='btn-reset'>Reset</button>
            </div>
    ";

    // if user clicked submit btn
    if (isset($_POST['btn-submit'])) {
        // fetch all data
        $nama_penyanyi = $_POST['nama_penyanyi'];

        // call insert method
        if($penyanyi->insertPenyanyi($nama_penyanyi)>0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'penyanyi.php';
                </script>
                ";
        }else {
            echo "
                <script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'penyanyi.php';
                </script>
                ";
        }
        
    }
}

// if user clicked edit btn
if (isset($_GET['id_update'])) {
    // fetch the pk
    $id_update = $_GET['id_update'];

    // get all data from the record
    $penyanyi->getDetailPenyanyi($id_update);
    $row = $penyanyi->getResult();

    // creating form
    $inputTitle = "Edit Penyanyi";
    $dataForm = "
            <div class='mb-3'>
              <input type='hidden' class='form-control' id='id_penyanyi' name='id_penyanyi' value='". $row['id_penyanyi'] ."' />
              <label for='nama_penyanyi' class='form-label'>Nama Penyanyi</label>
              <input type='text' class='form-control' id='nama_penyanyi' name='nama_penyanyi' value='". $row['nama_penyanyi'] ."' placeholder='Masukan Nama Penyanyi...' required />
            </div>
            <div class='float-end'>
                <button type='submit' class='btn btn-custom' name='btn-edit' id='btn-edit'>Submit</button>
                <button type='reset' class='btn btn-secondary' name='btn-reset' id='btn-reset'>Reset</button>
            </div>
    ";

    // if user clicked submit edit btn
    if (isset($_POST['btn-edit'])) {
        // fetch all data
        $id_penyanyi = $_POST['id_penyanyi'];
        $nama_penyanyi = $_POST['nama_penyanyi'];

        // call update method
        if($penyanyi->updatePenyanyi($id_penyanyi, $nama_penyanyi)>0){
            echo "
            <script>
            alert('Data berhasil diubah!');
            document.location.href = 'penyanyi.php';
            </script>
            ";
        }else {
            echo "
            <script>
            alert('Data Gagal diubah!');
            document.location.href = 'penyanyi.php';
            </script>
            ";
        }
    }
}

// if user clicked delete btn
if (isset($_GET['id_delete'])) {
    // fetch the pk
    $id_penyanyi = $_GET['id_delete'];

    // call delete method
    if($id_penyanyi > 0){
        if($penyanyi->deletePenyanyi($id_penyanyi)>0){
            echo 
            "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'penyanyi.php';
            </script>
            ";
        }else {
            echo 
            "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'penyanyi.php';
            </script>
            ";
        }
    }
}

// create navbar
$dataNavbar .= "
            <li class='nav-item'>
                <a class='nav-link active' href='penyanyi.php'>Penyanyi</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link ' href='genre.php'>Genre</a>
            </li>
";

// create table header
$dataHeader .= "
            <th scope='col'>No</th>
            <th scope='col'>Nama Penyanyi</th>
            <th scope='col'>Action</th>
";

// open db
$penyanyi->getPenyanyi();
$no = 1;
// fetch all records
while ($row = $penyanyi->getResult()) {
    // create table row
    $dataContent .= '
    <tr>
        <th scope="row">' . $no . '</th>
        <td>' . $row['nama_penyanyi'] . '</td>
        <td style="font-size: 22px;">
            <a href="penyanyi.php?id_update=' . $row['id_penyanyi'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;
            <a href="penyanyi.php?id_delete=' .$row['id_penyanyi'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>
    ';
    $no++;
}

$dataNama="Penyanyi";
// close db
$penyanyi->close();

// apply to the template
$tpl = new Template("templates/skintable.html");
$tpl->replace("DATA_NAVBAR", $dataNavbar);
$tpl->replace("DATA_TITLE", $title);
$tpl->replace("DATA_INPUT_TITLE", $inputTitle);
$tpl->replace("DATA_INPUT_FORM", $dataForm);
$tpl->replace("DATA_HEADER", $dataHeader);
$tpl->replace("DATA_CONTENT", $dataContent);
$tpl->replace("DATA_NAMA", $dataNama);
$tpl->write();

?>