<?php
    include "php/connection_db.php";   // variable de $connection
    ///compter le nombre total de commande
    // Query to count the total number of rows in the 'commande' table
    $requ1 = "SELECT COUNT(*) AS total_commande FROM commande";
    $result1 = mysqli_query($connection, $requ1);
    $res1 = mysqli_fetch_assoc($result1);
    
    // Query to count the distinct number of cities in the 'commande' table
    $requ2 = "SELECT COUNT(DISTINCT ville) AS distinct_ville FROM commande";
    $result2 = mysqli_query($connection, $requ2);
    $res2 = mysqli_fetch_assoc($result2);
    
    // Query to count the total number of rows in the 'historique' table
    $requ3 = "SELECT COUNT(*) AS total_historique FROM historique";
    $result3 = mysqli_query($connection, $requ3);
    $res3 = mysqli_fetch_assoc($result3);
    ////le Nombre des produit
    $requ4 = "SELECT COUNT(*) AS total_produit FROM produit";
    $result4 = mysqli_query($connection, $requ4);
    $res4 = mysqli_fetch_assoc($result4);
     ////le Nombre des Admin
     $requ5 = "SELECT COUNT(*) AS total_admin FROM admin";
     $result5 = mysqli_query($connection, $requ5);
     $res5 = mysqli_fetch_assoc($result5);
?>