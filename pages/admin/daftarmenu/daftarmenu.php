<?php

  require '../../../config/configmakanan.php';

  $db = new Database_makanan();
  $data = $db->tampil_data("SELECT * FROM makanan");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../link.css">
</head>
<body>
    <div class="container mt-3">
        <div class='d-flex justify-content-between'>
            <h3 claas='mt-3'>Daftar Pesanan Pelanggan</h3>
            <h5><a class='link' href="../landingpageadmin.php">Home</a></h5>
        </div>
        <hr/>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Makanan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Asal Makanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>

            <?php
           $no = 1;
                    foreach($data as $row) :
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['id_makanan']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['asal_makanan']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['gambar']; ?></td>
                    <td> 
					<a class='link' href="prosesdaftarmenu.php?id_makanan=<?php echo $row['id_makanan']; ?>&aksi=hapus">Hapus</a> | 
                    <a class='link' href="../editmenu/editmenu.php?id_makanan=<?php echo $row['id_makanan']; ?>&aksi=edit">Edit</a> </td>
                </tr>
            </tbody>
            <?php endforeach; ?>

        </table>
    </div>
</body>
</html>