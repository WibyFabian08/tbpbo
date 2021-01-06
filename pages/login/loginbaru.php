<?php

require '../../config/configuser.php';

$db_user = new Database_user();

$con = mysqli_connect("localhost", "root", "", "tbpbo");

session_start();

if(isset($_POST['login'])) {
    
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

                if(($username == 'Admin')|| ($username == 'admin')){
                    header("location:../admin/landingpageadmin.php");
                    exit;
                } else {
                    header("location:../menu/cardsmenu.php");
                    exit;
                }
                
            } else {
                echo "<script>alert('Email Atau Password Salah');</script>";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="loginbaru.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
        </div>
        <form action='' method="post">
            <h3>Login</h3>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btnContact" value="Login" />
                    </div>
                    <p>Belum Punya Akun? <a href="../register/registerbaru.php">Buat Akun</a></p>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>

