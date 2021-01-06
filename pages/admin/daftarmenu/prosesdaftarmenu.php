<?php 

require '../../../config/configmakanan.php';

$db_makanan = new Database_makanan();

$aksi = $_GET['aksi'];

if($aksi == 'hapus') {
    $id = $_GET['id_makanan'];

    $db_makanan->hapus($id);

    header("location:daftarmenu.php");    
}
?>
