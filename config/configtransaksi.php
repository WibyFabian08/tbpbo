<?php

class Database_transaksi{

    function __construct(){
        $con = mysqli_connect("localhost", "root", "");
        $this->con = $con;
        mysqli_select_db($con,"tbpbo");
    }

    function tampil_data($query){
        $this->query = $query;
        $hasil = [];
        $data = mysqli_query($this->con, "SELECT * FROM transaksi");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        
        return $hasil;
    }

    function input($id_user, $id_makanan, $jumlah_pesan, $total_harga, $keterangan, $alamat, $no_handphone){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "INSERT INTO transaksi VALUES('','$id_user','$id_makanan','$jumlah_pesan', '$total_harga', '$keterangan', '$alamat', '$no_handphone')");
    }

    function hapus($id_transaksi){ mysqli_query($this->con,"delete from transaksi where id_transaksi='$id_transaksi'");
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
    }

    function edit($id_transaksi){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        $data = mysqli_query($con, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update($id_transaksi,$id_user, $id_makanan, $jumlah_pesan, $total_harga, $keterangan, $alamat, $no_handphone){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "UPDATE transaksi SET id_user= '$id_user', id_makanan = '$id_makanan', jumlah_pesan = '$jumlah_pesan', total_harga = '$total_harga', keterangan = '$keterangan', alamat = '$alamat', no_handphone = '$no_handphone' WHERE id_transaksi = '$id_transaksi'");
    }
}

// $db = new Database_transaksi();

// foreach($db->tampil_data("SELECT * FROM transaksi") as $x){
//     echo $x['id_transaksi'];
// }

?>