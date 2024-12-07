<?php
    $connection = mysqli_connect("localhost", "root", "", "licence");
    $response = array();
    if(isset($_POST['entrer']) && $_POST['entrer'] == 1) {
        $email = $_POST['email'];
        $pass = $_POST['password'];  
            // Préparation de la requête pour éviter les injections SQL
            $requ = $connection->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
            $requ->bind_param("ss", $email, $pass);
            $requ->execute();
            $res = $requ->get_result();
            if ($res) {
                $user = $res->fetch_assoc();
                if ($user) {
                    session_start();
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['pass'] = $user['password'];
                    $_SESSION['nom'] = $user['nom'];
                    $response['success'] = true;
                    $response['message']="safi nadi";
                    $response['redirect'] = 'dashbord.php';
                    // Créer des cookies si l'email est présent dans la session
                    $email = $_SESSION['email'];
                    $cookie_name = "user_email";
                    $cookie_value = $email;
                    $cookie_expiration_time = time() + 5000; // 2 secondes
                    setcookie($cookie_name, $cookie_value, $cookie_expiration_time, "/"); // '/' rend le cookie disponible pour l'ensemble du site
                    // Vous pouvez ajouter d'autres cookies ici si nécessaire
                } else {
                    $response['success'] = false;
                }
            } else {
                $response['success'] = false;
            }
            $requ->close();
    }
    if(isset($_POST['create']) && $_POST['create']==1){
        $gmail=$_POST['gmail'];
        $pass=$_POST['pass'];
        $name=$_POST['nom_admin'];
        $requ="INSERT INTO admin values ('$gmail','$pass','$name')";
        $res=mysqli_query($connection,$requ);
        if($res){
            $response['success']=true;
        }else{
            $response['success']=false;
            $response['message']="le compte n'a pas été crée";
        }
    }
    if(isset($_POST['logout'])){
        $cookie_name = "user_email";
        setcookie($cookie_name, '', time() - 3600, "/"); // '/' makes the cookie available across the whole site
        
        // Optionally, unset the session cookie as well
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: http://localhost/projet_php/layout/login_admin.php');
        exit(); 
    }
    //$response['success']=true;
    echo json_encode($response);
    mysqli_close($connection);
?>
