<?php

class Database_user{

    function __construct(){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
    }

    function tampil_data($query){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        $this->query = $query;
        $data = mysqli_query($con, $this->query);
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }

        return $hasil;
    }

    function register($username, $email, $password){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "INSERT INTO user VALUES('','$username','$email','$password')");
    }

    function login($username) {
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
    }

    function hapus($id_user){ 
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "DELETE FROM user WHERE id_user = '$id_user'");
    }

    function edit($id_user){
        $data = mysqli_query($con, "SELECT * FROM user WHERE id_user = '$id_user'");
        while($d = mysqli_fetch_assoc($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update($id_user,$username,$email,$password){
        $con = mysqli_connect("localhost", "root", "", "tbpbo");
        mysqli_query($con, "UPDATE user SET username = '$username', email = '$email', password = '$password' where id_user = '$id_user'");
    }
}

?>