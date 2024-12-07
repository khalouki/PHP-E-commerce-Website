<?php
    try{
        $connection = mysqli_connect("localhost", "root", "", "licence");
    }catch(Exception $e){
        echo "Erreur". $e->getMessage();
    }
?>