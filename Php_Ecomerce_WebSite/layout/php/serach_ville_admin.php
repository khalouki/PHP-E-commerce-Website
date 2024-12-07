<?php
include 'connection_db.php';
$ville=$_POST['select_ville'];
$products_per_page = 5; // Set the number of products per page
// Query to count total number of products
$query_count = "SELECT COUNT(*) AS total FROM commande where ville='$ville'";
$result_count = mysqli_query($connection, $query_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_products = $row_count['total'];
//Free the result set
mysqli_free_result($result_count);
// Calculate the total number of pages
$total_pages = ceil($total_products / $products_per_page);
// Get the current page number from the AJAX request
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
// Calculate the starting index of products for the current page
$start_index = ($page - 1) * $products_per_page;
// Query to fetch products for the current page with a limit and offset
$query_page = "SELECT * FROM commande where ville='$ville'  LIMIT $start_index, $products_per_page";
$result_page = mysqli_query($connection, $query_page);
$ville_query="SELECT DISTINCT ville FROM commande";
$ville_res=mysqli_query($connection,$ville_query);
// Check if the query executed successfully
if ($result_page) {
    //ftech commande ville distinc
    $commande_vill=mysqli_fetch_all($ville_res);
    // Fetch products for the current page
    $products_page = mysqli_fetch_all($result_page, MYSQLI_ASSOC);
    // Free the result set
    mysqli_free_result($result_page);
    // Close the database connection
    mysqli_close($connection);
    // Return products data and total pages as JSON
    echo json_encode(['products' => $products_page, 'total_pages' => $total_pages,"ville"=>$commande_vill]);
} else {
    // Return an error message as JSON
    echo json_encode(['error' => 'Error fetching products']);
}
?>