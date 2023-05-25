<?php

include("config/db.php");
include("classes/DB.php");
include("classes/Genre.php");
include("classes/Template.php");

// open db
$genre = new Genre($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$genre->open();



$dataNavbar = null;
$dataHeader = null;
$dataContent = null;
$dataForm = null;
$title = "Genre";

// add genre
if (!isset($_GET['id_update'], $_GET['id_delete'])) {
    // creating form
    $inputTitle = "Tambah Genre";
    $dataForm = "
            <div class='mb-3'>
              <label for='nama_genre' class='form-label'>Nama Genre</label>
              <input type='text' class='form-control' id='nama_genre' name='nama_genre' placeholder='Masukan Nama Genre...' required />
            </div>
            <div class='float-end'>
                <button type='submit' class='btn btn-custom' name='btn-submit' id='btn-submit'>Submit</button>
                <button type='reset' class='btn btn-secondary' name='btn-reset' id='btn-reset'>Reset</button>
            </div>
    ";

    // if user clicked submit btn
    if (isset($_POST['btn-submit'])) {
        // fetch all data
        $nama_genre = $_POST['nama_genre'];

        // call insert method
        if($genre->insertGenre($nama_genre)>0){
            echo "
                <script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'genre.php';
                </script>
                ";
        }else {
            echo "
                <script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'genre.php';
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
    $genre->getDetailGenre($id_update);
    $row = $genre->getResult();

    // creating form
    $inputTitle = "Edit Genre";
    $dataForm = "
    
            <div class='mb-3'>
              <input type='hidden' class='form-control' id='id_genre' name='id_genre' value='". $row['id_genre'] ."' />
              <label for='nama_genre' class='form-label'>Nama Genre</label>
              <input type='text' class='form-control' id='nama_genre' name='nama_genre' value='". $row['nama_genre'] ."' placeholder='Masukan Nama Genre...' required />
            </div>
            <div class='float-end'>
                <button type='submit' class='btn btn-custom' name='btn-edit' id='btn-edit'>Submit</button>
                <button type='reset' class='btn btn-secondary' name='btn-reset' id='btn-reset'>Reset</button>
            </div>
    ";

    // if user clicked submit edit btn
    if (isset($_POST['btn-edit'])) {
        // fetch all data
        $id_genre = $_POST['id_genre'];
        $nama_genre = $_POST['nama_genre'];

        // call update method
        if($genre->updateGenre($id_genre, $nama_genre)>0){
            echo "
            <script>
            alert('Data berhasil diubah!');
            document.location.href = 'genre.php';
            </script>
            ";
        }else {
            echo "
            <script>
            alert('Data Gagal diubah!');
            document.location.href = 'genre.php';
            </script>
            ";
        }
    }
}

// if user clicked delete btn
if (isset($_GET['id_delete'])) {
    // fetch the pk
    $id_genre = $_GET['id_delete'];

    // call delete method
    if($id_genre > 0){
        if($genre->deleteGenre($id_genre)>0){
            echo 
            "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'genre.php';
            </script>
            ";
        }else {
            echo 
            "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'genre.php';
            </script>
            ";
        }
    }
}

// create navbar
$dataNavbar .= "
            <li class='nav-item'>
                <a class='nav-link' href='penyanyi.php'>Penyanyi</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link active' href='genre.php'>Genre</a>
            </li>
";

// create table header
$dataHeader .= "
            <th scope='col'>No</th>
            <th scope='col'>Nama Genre</th>
            <th scope='col'>Action</th>
";

// open db
$genre->getGenre();
$no = 1;
// fetch all records
while ($row = $genre->getResult()) {
    // create table row
    $dataContent .= '
    <tr>
        <th scope="row">' . $no . '</th>
        <td>' . $row['nama_genre'] . '</td>
        <td style="font-size: 22px;">
            <a href="genre.php?id_update=' . $row['id_genre'] . '" title="Edit Data"><i class="bi bi-pencil-square text-warning"></i></a>&nbsp;
            <a href="genre.php?id_delete=' .$row['id_genre'] . '" title="Delete Data"><i class="bi bi-trash-fill text-danger"></i></a>
        </td>
    </tr>
    ';
    $no++;
}

// close db
$genre->close();
$dataNama = "Genre";
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