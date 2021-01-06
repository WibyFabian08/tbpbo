<?php

  require '../../config/configmakanan.php';

  $db = new Database_makanan();

  session_start();

  if(!isset($_SESSION['username'])) {
    header("location:loginbaru.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Daftar Menu</title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700|Raleway:300,400,500,700">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="cardsmenu.css">
    <link rel="stylesheet" href="../../link.css">
</head>
<body>
    
      <div class="wrapper-grey padded">
        <div class="container">
          <div class='d-flex justify-content-between'>
              <h2>Daftar Menu Pilihan</h2>
              <h3><a class="link" href="../pesan/pesan.php">Pesan Makanan</a></h3>
          </div>
          <h3><?php echo $_SESSION['username'] ?> | <a class='link' href="../logout/logout.php">Logout</a></h3>
          <hr/>
            <?php
              foreach($db->tampil_data("SELECT * FROM makanan") as $row) :
            ?>

            <div class="col-xs-12 col-sm-4">
              <div class="card" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.2)), url('../../asset/<?php echo $row['gambar'] ?>');">
                <div class="card-category"><?php echo $row['nama'] ?></div>
                <div class="card-description">
                  <h2><?php echo 'Asal ', $row['asal_makanan'] ?></h2>
                  <p><?php echo 'Rp. ', $row['harga'] ?></p>
                </div>
              </div>
            </div>

            <?php endforeach; ?>

          </div>
        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
</body>
</html>
