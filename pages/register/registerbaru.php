<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../login/loginbaru.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <div class="container contact-form">
        <div class="contact-image">
            <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
        </div>
        <form action='prosesregistrasi.php?aksi=tambah' method="post">
            <h3>Daftar</h3>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 text-center">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" class="btnContact" value="Register" />
                    </div>
                    <p>Sudah Punya Akun? <a href="../login/loginbaru.php">Login</a> | <a href="../../">Home</a></p>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>

