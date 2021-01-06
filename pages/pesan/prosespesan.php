<?php

require '../../config/configtransaksi.php';
require '../../config/configmakanan.php';

$db_transaksi = new Database_transaksi();
$db_makanan = new Database_makanan();

$aksi = $_GET['aksi']; 

if($aksi == 'tambah') {

    // $id_makanan = $_POST['id_makanan'];
    // $harga_makanan = $db_makanan->tampil_data("SELECT harga FROM makanan WHERE id_makanan = '$id_makanan'");
    // // $total_harga = $harga_makanan * $_POST['jumlah_pesanan'];


    $db_transaksi->input($_POST['id_user'], $_POST['id_makanan'], $_POST['jumlah_pesanan'], 50000, $_POST['keterangan'],$_POST['alamat'],$_POST['no_handphone']);

    header("location:pesan.php");    
}

?>