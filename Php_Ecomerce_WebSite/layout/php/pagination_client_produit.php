<?php
    include 'connection_db.php';
    $products_per_page = 3; // Set the number of products per page
    // Query to count total number of products
    $query_count = "SELECT COUNT(*) AS total FROM produit";
    $result_count = mysqli_query($connection, $query_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $total_products = $row_count['total'];
    // Free the result set
    mysqli_free_result($result_count);
    // Calculate the total number of pages
    $total_pages = ceil($total_products / $products_per_page);
    // Get the current page number from the AJAX request
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    // Calculate the starting index of products for the current page
    $start_index = ($page - 1) * $products_per_page;
    // Query to fetch products for the current page with a limit and offset
    $query_page = "SELECT * FROM produit LIMIT $start_index, $products_per_page";
    $result_page = mysqli_query($connection, $query_page);
    // Check if the query executed successfully
    if ($result_page) {
        // Fetch products for the current page
        $products_page = mysqli_fetch_all($result_page, MYSQLI_ASSOC);
        // Free the result set
        mysqli_free_result($result_page);
        // Close the database connection
        mysqli_close($connection);
        // Return products data and total pages as JSON 
         // Return products data and total pages as JSON
         echo json_encode(['products' => $products_page,'total_pages' => $total_pages]);  
    }else {
        // Return an error message as JSON
        echo json_encode(['error' => 'Error fetching products']);
    }
?>