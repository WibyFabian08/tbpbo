<?php

require '../../config/configuser.php';
require '../../config/configmakanan.php';
require '../../config/configtransaksi.php';

$db_makanan = new Database_makanan();
$db_user = new Database_user();
$db_transaksi = new Database_transaksi();

session_start();


if(isset($_POST['submit'])) {

    $db_transaksi->input($_POST['id_user'], $_POST['id_makanan'], $_POST['jumlah_pesanan'], 50000, $_POST['keterangan'],$_POST['alamat'],$_POST['no_handphone']);

    echo "<script>alert('Pesan Sukses');</script>";   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Makanan</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="pesan.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                <h3>Welcome</h3>
                <p>Kami siap melayani kebutuhan anda dengan senang hati</p>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="../menu/cardsmenu.php" role="tab" aria-controls="home" aria-selected="true">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="../keranjang/daftarpesanan.php" role="tab" aria-controls="profile" aria-selected="false">Keranjang</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Silahkan Masukan Pesanan Anda</h3>

                        <form action="" method='POST'>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name='id_user' class="form-control" aria-label=".form-select-lg example">
                                            <option selected value="<?php echo $_SESSION['id_user'] ?>"><?php echo $_SESSION['username'] ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name='id_makanan' class="form-control" aria-label=".form-select-lg example">
                                            <option selected>Pilih Menu</option>

                                            <?php
                                                foreach($db_user->tampil_data("SELECT * FROM makanan") as $row) :
                                            ?>
                                                <option value=<?php echo $row['id_makanan']?>><?php echo $row['id_makanan']?> . <?php echo $row['nama']?> | <?php echo 'Rp. ', $row['harga']?></option>
                                                
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input name='jumlah_pesanan' type="text" class="form-control" placeholder="Jumlah Pesanan" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input name='keterangan' type="text" class="form-control"  placeholder="Keterangan" value="" />
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name='alamat' type="text" class="form-control" placeholder="Alamat" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input name='no_handphone' type="text" name="txtEmpPhone" class="form-control" placeholder="No Handphone" value="" />
                                        </div>
                                        <input type="submit" name='submit' class="btnRegister"  value="Pesan"/>
                                    </div>
                                </form>

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>