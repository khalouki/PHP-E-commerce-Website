<?php
 include 'connection_db.php';
 $requet = "SELECT image FROM produit";
 $liste_produits = mysqli_query($connection, $requet);
 $produits = mysqli_fetch_all($liste_produits, MYSQLI_ASSOC);
 // Vérifier si la requête s'est bien exécutée
 if (!$liste_produits) {
     // Afficher un message d'erreur si la requête a échoué
     echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connection);
     // Arrêter l'exécution du script ou gérer l'erreur d'une autre manière si nécessaire
     exit;
 }
 
 // Nombre de produits par page
 $produits_par_page = 4;
 
 // Nombre total de produits
$total_produits = count($produits);

 
 // Nombre total de pages
 $total_pages = ceil($total_produits / $produits_par_page);
 
 // Récupérer le numéro de page actuel depuis l'URL
 $numero_page = isset($_GET['page']) ? $_GET['page'] : 1;
 
 // Déterminer l'indice de départ des produits pour la page actuelle
 $indice_depart = ($numero_page - 1) * $produits_par_page;
 
 // Requête SQL pour récupérer les produits de la page actuelle avec une limite et un décalage
 $requet_page = "SELECT image FROM produit LIMIT $indice_depart, $produits_par_page";
 $resultat_page = mysqli_query($connection, $requet_page);
 
 // Vérifier si la requête s'est bien exécutée
 if (!$resultat_page) {
     // Afficher un message d'erreur si la requête a échoué
     echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connection);
     // Arrêter l'exécution du script ou gérer l'erreur d'une autre manière si nécessaire
     exit;
 }

 // Récupérer les produits pour la page actuelle
 $produits_page = mysqli_fetch_all($resultat_page, MYSQLI_ASSOC);

 // Libérer le résultat de la requête
 mysqli_free_result($resultat_page);

 // Fermer la connexion à la base de données
 mysqli_close($connection);

?>