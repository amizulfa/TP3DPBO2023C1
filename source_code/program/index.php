<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Genre.php');
include('classes/Penyanyi.php');
include('classes/Musik.php');
include('classes/Template.php');

$listMusik = new Musik($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$listMusik->open();
$listMusik->getMusikJoin();

if (isset($_POST['btn-cari'])) {
  $listMusik->searchMusik($_POST['cari']);
}else if (isset($_POST['btn-jdl-asc'])) {
  $listMusik->filterJudulAsc();
}else if (isset($_POST['btn-jdl-desc'])) {
  $listMusik->filterJudulDesc();
}else if (isset($_POST['btn-gnr-asc'])) {
  $listMusik->filterGenreAsc();
}else if (isset($_POST['btn-gnr-desc'])) {
  $listMusik->filterGenreDesc();
}else if (isset($_POST['btn-pny-asc'])) {
  $listMusik->filterPenyanyiAsc();
}else if (isset($_POST['btn-pny-desc'])) {
  $listMusik->filterPenyanyiDesc();
}else {
  $listMusik->getMusikJoin();
}

$data = null;

while ($row = $listMusik->getResult()) {
  $data .= '<div class="col-md-3 mb-4 d-flex justify-content-center">' .
  '<div class="card pt-4 px-2 musik-thumbnail">
  <a href="detail.php?id=' . $row['id_musik'] . '">
      <div class="row justify-content-center">
          <img src="assets/' . $row['cover'] . '" class="card-img-top" alt="' . $row['cover'] . '">
      </div>
      <div class="card-body">
          <p class="card-text musik-nama fw-bold my-0" style="font-size: 1.1em;">' . $row['judul'] . '</p>
          <p class="card-text genre-nama " style="font-size: 1em; color: rgb(20, 51, 79);">' . $row['nama_genre'] . '</p>
          <p class="card-text penyanyi-nama " style="font-size: 1em; color: rgb(43, 20, 145);">' . $row['nama_penyanyi'] . '</p>
      </div>
  </a>
</div>    
</div>';
}

$listMusik->close();
$home = new Template('templates/index.html');
$home->replace('DATA_TABLE', $data);
$home->write();
