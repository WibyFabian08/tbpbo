<?php 

require '../../../config/configmakanan.php';

$db_makanan = new Database_makanan();

$aksi = $_GET['aksi'];

if($aksi == 'update'){

    $gambarLama = $_POST['gambarLama'];

    if($_FILES['gambar']['error'] === 4){
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

    $db_makanan->update($_POST['id_makanan'], $_POST['nama'], $_POST['asal_makanan'], $_POST['harga'], $gambar);

    header("location:../daftarmenu/daftarmenu.php");
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
