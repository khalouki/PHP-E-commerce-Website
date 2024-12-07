<?php
    $connection = mysqli_connect("localhost", "root", "", "licence");
    $response = array();
if($_SERVER["REQUEST_METHOD"] == "POST"  &&  $_POST['opt']=="commander"){
    $nom_client = $_POST['nom'];
    $prenom_client = $_POST['prenom'];
    $ville_client = $_POST['ville'];
    $teli_client = $_POST['teli'];
    $prod_name=$_POST['prod_nom'];
    $addres_client=$_POST['adress'];
    $contité=$_POST['contité'];
    $requ = "INSERT INTO commande (nom,prenom,ville,phone,produit,adress,contité) 
            VALUES ('$nom_client','$prenom_client','$ville_client','$teli_client','$prod_name','$addres_client','$contité')";
    $res = mysqli_query($connection, $requ);
    if ($res) {    
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['message'] = "Failed to send commande.";
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"  &&  $_POST['opt']=="valide"){
        $id=$_POST['cmd_id'];
        $requ="SELECT *FROM commande where id='$id' ";
        $res=mysqli_query($connection,$requ);
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);
            $nom_client = $row['nom'];
            $prenom_client = $row['prenom'];
            $ville_client = $row['ville'];
            $teli_client = $row['phone'];
            $prod_name=$row['produit'];
            $addres_client=$row['adress'];
            $contité=$row['contité'];
            $requ2 = "INSERT INTO historique (nom,prenom,ville,phone,produit,adress,contité) 
            VALUES ('$nom_client','$prenom_client','$ville_client','$teli_client','$prod_name','$addres_client','$contité')";
            $requ_update_contité="UPDATE produit SET contité=contité-'$contité' where nom='$prod_name'";
            mysqli_query($connection, $requ2);
            mysqli_query($connection,$requ_update_contité);
            $requ3="DELETE FROM commande where id='$id'";
            $res_final=mysqli_query($connection, $requ3);
            if ($res_final) {    
                $response['success'] = true;
            } else {
                $response['success'] = false;
                $response['message'] = "Failed to save historique.";
            }
        }
}
if($_SERVER["REQUEST_METHOD"] == "POST"  && $_POST["opt"]=="send_message"){
    $nom_client = $_POST['nom'];
    $phone_client = $_POST['phone'];
    $email_client = $_POST['email'];
    $message_client = $_POST['message'];
    $requ = "INSERT INTO message (nom,teliphone,email,messag) 
            VALUES ('$nom_client','$phone_client','$email_client','$message_client')";
    $res = mysqli_query($connection, $requ);
    if ($res) {    
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['message'] = "Failed to send commande.";
    }
}
echo json_encode($response);
?>