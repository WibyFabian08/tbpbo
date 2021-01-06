<?php

class Database_makanan{

    function __construct(){
        $con = mysqli_connect("localhost", "root", "");
        $this->con = $con;
        mysqli_select_db($con,"tbpbo");
    }

  function tampil_data($query){
        $this->query = $query;
        $hasil = [];
        $data = mysqli_query($this->con, "SELECT * FROM makanan");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        
        return $hasil;
    }

    function input($nama, $asal_makanan, $harga, $gambar){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "INSERT INTO makanan VALUES('','$nama','$asal_makanan','$harga', '$gambar')");
    }

  function hapus($id_makanan){ mysqli_query($this->con,"delete from makanan where id_makanan='$id_makanan'");
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
    }

      function edit($id_makanan){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        $data = mysqli_query($con, "SELECT * FROM makanan WHERE id_makanan = '$id_makanan'");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update($id_makanan, $nama, $asal_makanan, $harga, $gambar){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "UPDATE makanan SET nama = '$nama', asal_makanan = '$asal_makanan', harga = '$harga', gambar = '$gambar' where id_makanan = '$id_makanan'");
    }
}

?>