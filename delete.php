<?php
    if  (isset ($_GET["id"]) ) {
        $id = $_GET["id"];
    


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "crud_activity"; 

        ////connection

        $connection = new mysqli($servername, $username, $password, $dbname);

        $sql = "DELETE * FROM clients WHERE id=$id";
            $result = $connection->query($sql);
    }

    header("Location: http://localhost/CRUD-DevOPS/index.php");
    exit;
?>