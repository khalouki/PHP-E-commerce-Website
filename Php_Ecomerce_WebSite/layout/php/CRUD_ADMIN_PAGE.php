<?php
// Establish database connection
$connection = mysqli_connect("localhost", "root", "", "licence");
$response = array();
$response["validate_format"]=true;
//fonction de verifier les information 
function validate($nom, $prix, $contité) {
    global $response;
    $valide = true;
    // Validation du nom
    if ((preg_match("#^[^0-9]+$#",$nom)) === 0) {
        $response["validate_format"] = false;
        $response["error_nom"] = "Le nom ne doit pas contenir de chiffres, $, /, @ ou &.";
        $valide = false;
    }else $response["error_nom"]="";
    // Validation du prix (doit être un nombre décimal)
    if (!is_numeric($prix)) {
        $response["validate_format"] = false;
        $response["error_prix"] = "Le prix doit être un nombre.";
        $valide = false;
    }else $response["error_prix"]="";
    // Validation de la quantité (doit être un nombre entier)
    if (!ctype_digit($contité)) {
        $response["validate_format"] = false;
        $response["error_contité"] = "La quantité doit être un nombre entier positif.";
        $valide = false;
    }else $response["error_contité"]="";
    return $valide;
}
//add new product php script
if($_SERVER["REQUEST_METHOD"] == "POST"  && $_POST['opt']=="add"){
    ////récupuration les informations
    $nom_prod = trim($_POST['nom_prod']);
    $prix_prod = trim($_POST['prix_prod']);
    $contité_prod = trim($_POST['contité_prod']);
    $caté_prod = $_POST['caté_prod'];
    // Validation des données
    if (validate($nom_prod, $prix_prod, $contité_prod) === false) {
        echo json_encode($response);
        exit();
    }
    ////télécharger l'image dans le serveur
    $destination_directory = 'C:/xampp/htdocs/projet_php/layout/images/';
    $file_name = $_FILES['imag']['name']; // Get the original file name
    // Temporary file path
    $file_tmp = $_FILES['imag']['tmp_name'];
    // Destination file path
    $destination_file = $destination_directory . $file_name;
    // Move the uploaded file to the specified directory
    if (move_uploaded_file($file_tmp, $destination_file)) {
        // File moved successfully
        // Prepare and execute the SQL query to insert data into the database
        $requ = "INSERT INTO produit (nom, image_prod, prix, catégorie, contité) VALUES ('$nom_prod','$destination_file','$prix_prod','$caté_prod','$contité_prod')";
        $res = mysqli_query($connection, $requ);
        if ($res) {    
            $response['success'] = true;
        } else {
            $response['success'] = false;
            $response['message'] = "Failed to insert data into the database.";
        }
    } else {
        // Failed to move file
        $response['success'] = false;
        $response['message'] = "Failed to move file to destination directory.";
    }    
}
//modifier les information d'un produit
elseif($_SERVER["REQUEST_METHOD"] == "POST"  && $_POST['opt']=="modifier"){
            $nom_prod = $_POST['nom'];
            $prix_prod = $_POST['prix'];
            $contité_prod = $_POST['contité'];
            $caté_prod = $_POST['caté'];
            $id_prod=$_POST['id_prod'];
            // Préparer et exécuter la requête SQL pour insérer les données dans la base de données
            $requ = "UPDATE produit SET nom='$nom_prod', prix='$prix_prod', catégorie='$caté_prod', contité='$contité_prod' WHERE id='$id_prod'";
            $res = mysqli_query($connection, $requ);
            if ($res) {    
                $response['success'] = true;
            } else {
                $response['success'] = false;
                $response['message'] = "Failed to update data.";
            }
}
// supprimer un produit d
elseif($_SERVER["REQUEST_METHOD"] == "POST"  && $_POST['opt']=="delete"){
        // Sanitize productId to prevent SQL injection
        $id_prod = $_POST['productId'];
        //supprimer image de produit
        $requ="SELECT image_prod from produit WHERE id='$id_prod'";
        $res=mysqli_fetch_assoc(mysqli_query($connection, $requ));
        if (file_exists($res["image_prod"])) {
            unlink($res["image_prod"]);
        }
        // Execute delete query
        $requ2 = "DELETE FROM produit WHERE id='$id_prod'";
        $res = mysqli_query($connection, $requ2);
        // Check if the delete query was successful
        if ($res) {    
            $response['success'] = true;
            $response['message'] = "data deleted.";
        } else {
            $response['success'] = false;
            $response['message'] = "Failed to insert data into the database.";
        }
}
elseif($_SERVER["REQUEST_METHOD"] == "POST"  && $_POST['opt']=="delete_histoqiue"){
    // Sanitize productId to prevent SQL injection
    $ID_prod = $_POST['productId'];
    // Execute delete query
    $query = "DELETE FROM historique WHERE id='$ID_prod'";
    $res = mysqli_query($connection, $query);
    // Check if the delete query was successful
    if ($res) {    
        $response['success'] = true;
        $response['message'] = "data deleted.";
    } else {
        $response['success'] = false;
        $response['message'] = "Failed to insert data into the database.";
    }
}
elseif($_SERVER["REQUEST_METHOD"] == "POST"  && $_POST['opt']=="delete_message"){
    // Sanitize productId to prevent SQL injection
    $ID_message = $_POST['messageId'];
    // Execute delete query
    $query = "DELETE FROM message WHERE id='$ID_message'";
    $res = mysqli_query($connection, $query);
    // Check if the delete query was successful
    if ($res) {    
        $response['success'] = true;
        $response['message'] = "message deleted.";
    } else {
        $response['success'] = false;
        $response['message'] = "erreur de suppression de message.";
    }
}
else{
    if (mysqli_connect_errno()) {
        $response['success'] = false;
        $response['message'] = "Failed to connect to MySQL: " . mysqli_connect_error();
        echo json_encode($response);
        exit();
    }
}
// Envoi de la réponse JSON
header('Content-Type: application/json');
echo json_encode($response);
$connection->close();
?>
