<?php
    $email  = $_POST['email'] ?? '';
    $password = $_POST['psw'] ?? '';
    $pswUser = '12345'; 

    $user = array(
        "email"=>"kmartinorozco@gmail.com",
        "password"=>password_hash($pswUser, PASSWORD_DEFAULT)
    );

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!empty($email) && !empty($password)) {
            if($email === $user["email"] && password_verify($password, $user["password"])){
                header('Location: login.php?status=success');
                exit;
            }else{
                header('Location: login.php?status=fail');
                exit;
            }
        }else{
            header('Location: login.php?status=empty');
            exit;
        }
    }    
?>