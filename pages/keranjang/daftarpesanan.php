<?php

//   $conn = mysqli_connect("localhost", "root", "", "tbpbo");

//   $transaksi = mysqli_query($conn, "SELECT * FROM transaksi");

require '../../config/configtransaksi.php';

$db = new Database_transaksi();

$data = $db->tampil_data("SELECT * FROM transaksi");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../link.css">
</head>
<body>
    <div class="container mt-3">
        <div class='d-flex justify-content-between'>
            <h3 claas='mt-3'>Daftar Pesanan Pelanggan</h3>
            <h5><a class='link' href="../menu/cardsmenu.php">Menu</a></h5>
        </div>
        <hr/>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Transaksi</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Id Makanan</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Total Harga</th>
					<th scope="col">Keterangan</th>
				    <th scope="col">Alamat</th>
					<th scope="col">No Handphone</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $no = 1;
                    foreach($data as $row) :
                ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $row['id_transaksi']?></td>
                    <td><?php echo $row['id_user']?></td>
                    <td><?php echo $row['id_makanan']?></td>
                    <td><?php echo $row['jumlah_pesan']?></td>
                    <td><?php echo 'Rp. ',  $row['total_harga']?></td>
					<td><?php echo $row['keterangan']?></td>
					<td><?php echo $row['alamat']?></td>
					<td><?php echo $row['no_handphone']?></td>
                    <td> 
					<a class='link' href="prosestransaksi.php?id_transaksi=<?php echo $row['id_transaksi']; ?>&aksi=hapus">Hapus</a> | <a class='link' href="../edit/editpesanan.php?id_transaksi=<?php echo $row['id_transaksi']; ?>&aksi=edit">Edit</a> </td>
                </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>
</html>


