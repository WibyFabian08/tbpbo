<?php

  $conn = mysqli_connect("localhost", "root", "", "tbpbo");

  $makanan = mysqli_query($conn, "SELECT * FROM makanan");

  $user = mysqli_query($conn, "SELECT * FROM user");

  $id_transaksi = $_GET['id_transaksi'];

  $transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = $id_transaksi");

  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../pesan/pesan.css">
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
                        <h3 class="register-heading">Edit Pesanan Anda</h3>

                        <form action="prosesedit.php?aksi=update" method='POST'>
                            <div class="row register-form">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <select name='id_transaksi' class="form-control" aria-label=".form-select-lg example">
                                            <option selected value="<?php echo $id_transaksi ?>"><?php echo 'Id Transaksi : ',   $id_transaksi ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select name='id_user' class="form-control" aria-label=".form-select-lg example">
                                            <option selected value="<?php echo $_SESSION['id_user'] ?>"><?php echo $_SESSION['username'] ?></option>
                                        </select>
                                    </div>

                                    <?php
                                        while($row = mysqli_fetch_assoc($transaksi)) :
                                    ?>

                                        <div class="form-group">
                                            <select name='id_makanan' class="form-control" aria-label=".form-select-lg example">
                                                
                                                    <option selected value=<?php echo $row['id_makanan']?>>Id Makanan : <?php echo $row['id_makanan']?></option>
                                                
                                            </select>
                                        </div>
                                                
                                        <div class="form-group">
                                            <input name='jumlah_pesan' type="text" class="form-control" placeholder="Jumlah Pesanan" value="<?php echo $row['jumlah_pesan']?>" />
                                        </div>
                                        <div class="form-group">
                                            <input name='keterangan' type="text" class="form-control"  placeholder="Keterangan" value="<?php echo $row['keterangan']?>" />
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name='alamat' type="text" class="form-control" placeholder="Alamat" value="<?php echo $row['alamat']?>" />
                                        </div>
                                        <div class="form-group">
                                            <input name='no_handphone' type="text" name="txtEmpPhone" class="form-control" placeholder="No Handphone" value="<?php echo $row['no_handphone']?>" />
                                        </div>
                                        <input type="submit" class="btnRegister" name='submit'  value="Simpan"/>
                                    </div>

                                    <?php endwhile; ?>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>



