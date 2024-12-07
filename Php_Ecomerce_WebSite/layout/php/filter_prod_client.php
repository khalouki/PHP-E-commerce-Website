<?php
include 'connection_db.php';

// Récupérer la catégorie sélectionnée depuis la requête AJAX
$type = isset($_POST['select_categorie']) ? $_POST['select_categorie'] : 'AC';

$products_per_page = 5; // Nombre de produits par page

// Requête pour compter le nombre total de produits dans la catégorie spécifiée
$query_count = "SELECT COUNT(*) AS total FROM produit WHERE catégorie = '$type'";
$result_count = mysqli_query($connection, $query_count);

if ($result_count) {
    $row_count = mysqli_fetch_assoc($result_count);
    $total_products = $row_count['total'];
    
    // Libérer le résultat de la requête COUNT
    mysqli_free_result($result_count);
    
    // Calculer le nombre total de pages nécessaires
    $total_pages = ceil($total_products / $products_per_page);
    
    // Récupérer le numéro de page actuelle depuis la requête AJAX
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    
    // Calculer l'index de départ des produits pour la page actuelle
    $start_index = ($page - 1) * $products_per_page;
    
    // Requête pour récupérer les produits de la page actuelle avec LIMIT et OFFSET
    $query_page = "SELECT * FROM produit WHERE catégorie = '$type' LIMIT $start_index, $products_per_page";
    $result_page = mysqli_query($connection, $query_page);
    
    if ($result_page) {
        // Récupérer tous les produits de la page actuelle en format associatif
        $products_page = mysqli_fetch_all($result_page, MYSQLI_ASSOC);
        
        // Libérer le résultat de la requête SELECT
        mysqli_free_result($result_page);
        
        // Fermer la connexion à la base de données
        mysqli_close($connection);
        
        // Retourner les données des produits et le nombre total de pages en JSON
        echo json_encode(['products' => $products_page, 'total_pages' => $total_pages]);
    } else {
        // Retourner un message d'erreur en JSON si la requête SELECT a échoué
        echo json_encode(['error' => 'Error fetching products']);
    }
} else {
    // Retourner un message d'erreur en JSON si la requête COUNT a échoué
    echo json_encode(['error' => 'Error counting products']);
}
?>
