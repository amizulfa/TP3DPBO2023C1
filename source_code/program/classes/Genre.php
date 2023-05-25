<?php

class Genre extends DB {
    // get all records from Genre table
        function getGenre() {
            // create the query
            $query = "SELECT * FROM genre";
            
            // executing the query
            return $this->execute($query);
        }

        function searchGenre($keyword)
        {
            $query = "SELECT * FROM genre WHERE nama_genre Like '%" . $keyword . "%'";
            return $this->execute($query);
        }

        function getDetailGenre($id_genre) {
            // create the query
            $query = "SELECT * FROM genre WHERE id_genre='$id_genre'";

            // executing the query
            return $this->execute($query);
        }

        // insert a record to Genre table
        function insertGenre($nama_genre) {
            // create the query
            $query = "INSERT INTO genre VALUES (null, '$nama_genre')";
            
            // executing the query
            return $this->executeAffected($query);
        }
    
        // update a record in Genre table
        function updateGenre($id_genre, $nama_genre) {
            // create the query
            $query = "UPDATE genre SET nama_Genre='$nama_genre' WHERE id_genre='$id_genre'";
            
            // executing the query
            return $this->executeAffected($query);
        }
    
        // delete a record in Genre record
        function deleteGenre($id_genre) {
            // create the query
            $query = "DELETE FROM genre WHERE id_genre='$id_genre'";
            
            // executing the query
            return $this->executeAffected($query);
        }

    }
?>