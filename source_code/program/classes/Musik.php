<?php

class Musik extends DB
{
    function getMusikJoin()
    {
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi ORDER BY musik.id_musik";

        return $this->execute($query);
    }

    function getMusik()
    {
        $query = "SELECT * FROM musik";
        return $this->execute($query);
    }

    function getMusikById($id)        
    {
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi WHERE id_musik=$id";
        return $this->execute($query);
    }

    function searchMusik($keyword)
    {
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi WHERE judul Like '%" . $keyword . "%'";
        return $this->execute($query);
    }

    function addData($data, $file)
    {
        // creating dir folder to store the image
        $targetDir = "./assets/";
        // fetch the image
        $cover = $file['cover']['name'];
        $tmpImage = $file['cover']['tmp_name'];
        // creating target dir for image
        $fileTargetDir = $targetDir . $cover;

        // if the image haven't exists in the dir
        if (!file_exists($fileTargetDir)) {
            // move the file to target dir for image
            $moveUploadedFile = move_uploaded_file($tmpImage, $fileTargetDir);
        }

        // fetch other data
        $judul = $data['judul'];
        $tahun_rilis = $data['tahun_rilis'];
        $durasi = $data['durasi'];
        $id_penyanyi = $data['id_penyanyi'];
        $id_genre = $data['id_genre'];

        // create the query
        $query = "INSERT INTO musik VALUES ( '','$judul', '$tahun_rilis', '$durasi','$cover', '$id_penyanyi', '$id_genre')";
        
        // executing the query
        return $this->executeAffected($query);
    }

    function updateData($idPrev, $data, $file, $image)
    {
         // creating dir folder to store the image
         $targetDir = "./assets/";
         // fetch the image
         $cover = $file['cover']['name'];
         $tmpImage = $file['cover']['tmp_name'];
         // creating target dir for image
         $fileTargetDir = $targetDir . $cover;
        
        if ($cover == "") {
            $cover = $image;
        }

         // if the image haven't exists in the dir
         if (!file_exists($fileTargetDir)) {
             // move the file to target dir for image
             $moveUploadedFile = move_uploaded_file($tmpImage, $fileTargetDir);
         }
 
         // fetch other data
         $judul = $data['judul'];
         $tahun_rilis = $data['tahun_rilis'];
         $durasi = $data['durasi'];
         $id_penyanyi = $data['id_penyanyi'];
         $id_genre = $data['id_genre'];
 
         // create the query
         $query = "UPDATE musik SET judul='$judul', tahun_rilis='$tahun_rilis', durasi='$durasi',cover='$cover', id_penyanyi='$id_penyanyi', id_genre='$id_genre' WHERE id_musik='$idPrev'";
         
         // executing the query
         return $this->executeAffected($query);
    }

    function deleteData($id)
    {
        $query = "DELETE FROM musik WHERE id_musik='$id'";
        return $this->executeAffected($query);
    }

    function filterJudulDesc(){
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi ORDER BY judul DESC";
        return $this->execute($query);
    }

    function filterJudulAsc(){
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi ORDER BY judul ASC";
        return $this->execute($query);
    }
    
    function filterGenreDesc(){
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi ORDER BY nama_genre DESC";
        return $this->execute($query);
    }

    function filterGenreAsc(){
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi ORDER BY nama_genre ASC";
        return $this->execute($query);
    }
    
    function filterPenyanyiDesc(){
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi ORDER BY nama_penyanyi DESC";
        return $this->execute($query);
    }

    function filterPenyanyiAsc(){
        $query = "SELECT * FROM musik JOIN genre ON musik.id_genre=genre.id_genre JOIN penyanyi ON musik.id_penyanyi=penyanyi.id_penyanyi ORDER BY nama_penyanyi ASC";
        return $this->execute($query);
    }
}
