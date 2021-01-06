<?php

require '../../config/configuser.php';

$db_user = new Database_user();

$con = mysqli_connect("localhost", "root", "", "tbpbo");

session_start();

$aksi = $_GET['aksi']; 
if($aksi == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username != null) {
        $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
    
        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $id_user = $row['id_user'];
    
            if(password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                $_SESSION['id_user'] = $id_user;
                header("location:../menu/cardsmenu.php");
                exit;
            } else {
                header("location:loginbaru.php");
                exit;
            }

        } else {
            header("location:loginbaru.php");
            exit;
        }
        
    } else {
        header("location:loginbaru.php");
        exit;
    }

}

?>