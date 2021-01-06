<?php

require '../../../config/configuser.php';
require '../../../config/configmakanan.php';
require '../../../config/configtransaksi.php';

$db_makanan = new Database_makanan();
$db_user = new Database_user();
$db_transaksi = new Database_transaksi();

session_start();


if(isset($_POST['submit'])) {

    $makanan = $_POST['nama_makanan'];
    $asal = $_POST['asal'];
    $harga = $_POST['harga'];

    $gambar = upload();

    if(!$gambar) {
        return false;
    }

    $db_makanan->input($makanan, $asal, $harga, $gambar);

    echo "<script>alert('Upload Sukses');</script>";   
}

?>

<?php 

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($error === 4) {
        echo "<script>alert('Harus Upload Gambar');</script>";
        return false; 
    }

    $ekstensiGambar = ['jpg', 'jpeg', 'png']; 
    $ekstensi = explode('.', $namaFile);
    $ekstensi = strtolower(end($ekstensi));

    if(!in_array($ekstensi, $ekstensiGambar)){
        echo "<script>alert('File Bukan Gambar');</script>";
        return false; 
    }

    if($ukuranFile > 5000000) {
        echo "<script>alert('File Terlalu Besar');</script>";
        return false; 
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensi;

    move_uploaded_file($tmpName, '../../../asset/' . $namaFileBaru);

    return $namaFileBaru;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Makanan</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../../pesan/pesan.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <h4>Admin</h4>
                <p>Silahkan Masukan Menu Baru</p>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="../landingpageadmin.php" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="../daftarmenu/daftarmenu.php" role="tab" aria-controls="profile" aria-selected="false">Daftar Menu</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Input Menu Baru</h3>

                        <form action="" method='POST' enctype="multipart/form-data">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name='nama_makanan' type="text" class="form-control" placeholder="Nama" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input name='asal' type="text" class="form-control"  placeholder="Asal Makanan" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name='harga' type="text" class="form-control" placeholder="Harga" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input name='gambar' type="file" name="txtEmpPhone" class="form-control" placeholder="Gambar" value="" />
                                    </div>
                                    <input type="submit" name='submit' class="btnRegister"  value="Tambah"/>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>