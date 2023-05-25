<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Genre.php');
include('classes/Penyanyi.php');
include('classes/Musik.php');
include('classes/Template.php');

$musik = new Musik($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$musik->open();

$data = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $musik->getMusikById($id);
        $row = $musik->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail Lagu ' . $row['judul'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="row justify-content-center">
                        <img src="assets/' . $row['cover'] . '" class="img-thumbnail" alt="' . $row['cover'] . '" width="100">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Judul Lagu</td>
                                    <td>:</td>
                                    <td>' . $row['judul'] . '</td>
                                </tr>
                                <tr>
                                    <td>Tahun Rilis Lagu</td>
                                    <td>:</td>
                                    <td>' . $row['tahun_rilis'] . '</td>
                                </tr>
                                <tr>
                                    <td>Durasi Lagu</td>
                                    <td>:</td>
                                    <td>' . $row['durasi'] . '</td>
                                </tr>
                                <tr>
                                    <td>Penyanyi</td>
                                    <td>:</td>
                                    <td>' . $row['nama_penyanyi'] . '</td>
                                </tr>
                                <tr>
                                    <td>Genre</td>
                                    <td>:</td>
                                    <td>' . $row['nama_genre'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="formMusik.php?edit=' . $row['id_musik'] . '"><button type="button" class="btn btn-custom text-white">Ubah Data</button></a>
                <a href="detail.php?hapus=' . $row['id_musik'] . '"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        if ($musik->deleteData($id) > 0) {
            echo 
            "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo 
            "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'index.php';
            </script>
            ";
        }
    }
}

$musik->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_PENGURUS', $data);
$detail->write();
