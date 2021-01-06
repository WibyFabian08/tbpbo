<?php

  $conn = mysqli_connect("localhost", "root", "", "tbpbo");

  $makanan = mysqli_query($conn, "SELECT * FROM makanan");
  
  $id_makanan = $_GET['id_makanan'];

  $makanan = mysqli_query($conn, "SELECT * FROM makanan WHERE id_makanan = $id_makanan");

  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit menu makanan</title>
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
                <p>Silahkan Edit Menu Makanan</p>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Edit Data Menu</h3>
                 
                        <form action="proseseditmenu.php?aksi=update" method='POST' enctype="multipart/form-data">
                            <div class="row register-form">
                                <div class="col-md-6">
								
                                    <?php
                                        while($row = mysqli_fetch_assoc($makanan)) :
                                    ?>

                                    <input type="hidden" name="id_makanan" value="<?php echo $id_makanan?>"/>
                                    <input type="hidden" name="gambarLama" value="<?php echo $row['gambar']?>"/>
                                    <div class="form-group">
                                        <input name='nama' type="text" class="form-control" placeholder="Nama" value="<?php echo $row['nama']?>" />
                                    </div>
                                    <div class="form-group">
                                        <input name='asal_makanan' type="text" class="form-control"  placeholder="Asal Makanan" value="<?php echo $row['asal_makanan']?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input name='harga' type="text" class="form-control" placeholder="Harga" value="<?php echo $row['harga']?>" />
                                    </div>
                                    <div class="form-group">
                                        <input name='gambar' type="file"  class="form-control" placeholder="Gambar"/>
                                    </div>
                                    <input type="submit" class="btnRegister" name='submit' value="Simpan"/>
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