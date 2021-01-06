<?php

require '../../config/configuser.php';

$db_user = new Database_user();

$con = mysqli_connect("localhost", "root", "", "tbpbo");

$aksi = $_GET['aksi']; 
if($aksi == 'tambah') {
    $username = stripslashes($_POST['username']); 
    $email = stripslashes($_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if($username != null) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $db_user->register($username, $email, $password);

        header("location:../login/loginbaru.php");
    } else {
        header("location:registerbaru.php");
        exit;
    }

}

?>