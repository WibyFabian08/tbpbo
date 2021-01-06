<?php

require '../../config/configtransaksi.php';

$db_transaksi = new Database_transaksi();

$aksi = $_GET['aksi']; 

if($aksi == 'hapus') {
    $id = $_GET['id_transaksi'];

    $db_transaksi->hapus($id);

    header("location:daftarpesanan.php");    
}

elseif($aksi == 'update'){
	
 $db_transaksi->update($_POST['id_transaksi'],$_POST['id_user'],$_POST['id_makanan'],$_POST['jumlah_pesan'],$_POST['total_harga'],$_POST['keterangan'],$_POST['alamat'],$_POST['no_handphone']);
 header("location:editpesanan.php");
}


?>