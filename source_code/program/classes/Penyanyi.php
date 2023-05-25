<?php

class Penyanyi extends DB {
        // get all records from Penyanyi table
        function getPenyanyi() {
            // create the query
            $query = "SELECT * FROM penyanyi";
            
            // executing the query
            return $this->execute($query);
        }

        // get all data from specific record in penyanyi
        function getDetailPenyanyi($id_penyanyi) {
            // create the query
            $query = "SELECT * FROM penyanyi WHERE id_penyanyi='$id_penyanyi'";

            // executing the query
            return $this->execute($query);
        }        

        // insert a record to Penyanyi table
        function insertPenyanyi($nama_penyanyi) {
            // create the query
            $query = "INSERT INTO penyanyi VALUES (null, '$nama_penyanyi')";
            
            // executing the query
            return $this->executeAffected($query);
        }
    
        // update a record in Penyanyi table
        function updatePenyanyi($id_penyanyi, $nama_penyanyi) {
            // create the query
            $query = "UPDATE penyanyi SET nama_Penyanyi='$nama_penyanyi' WHERE id_penyanyi='$id_penyanyi'";
            
            // executing the query
            return $this->executeAffected($query);
        }
    
        // delete a record in Penyanyi record
        function deletePenyanyi($id_penyanyi) {
            // create the query
            $query = "DELETE FROM penyanyi WHERE id_penyanyi='$id_penyanyi'";
            
            // executing the query
            return $this->executeAffected($query);
        }

    }
?>