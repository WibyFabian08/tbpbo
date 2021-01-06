<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../link.css">
</head>
<body>
    <div class='container'>
        <div class='body mt-3'>
            <div class='row'>
                <div class='col mt-5'>
                    <p class="display-1"><strong>Selamat Datang Admin</strong></p>
                    <p class="text-secondary mt-2 text-justify">
                        Hi ini adalah halaman utama khusus untuk admin . 
						Silahkan masukan menu terbaru dari warung salarea dan anda juga bisa mengedit menu yang sudah ada. 
						Jika makanan sudah habis, anda bisa menghapusnya didaftar menu yang sudah disediakan. Selamat bekerja !!! SEMANGAT 
                    </p>
                    <div class='row'>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <h4 class='mt-3'>
                                    <a class='link' href="../admin/addmenu/addmenu.php">
                                        Tambah Menu
                                    </a>
                                </h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class='mt-3'>
                                    <a class='link' href="../admin/daftarmenu/daftarmenu.php">
                                        Daftar Menu
                                    </a>
                                </h4>
                            </li>
                        </ul>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item">
                                <h4 class='mt-3'>
                                    <a class='link' href="../logout/logout.php">
                                        Logout
                                    </a>
                                </h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class='col mt-5'>
                <Image src='../../asset/admin.png' width='600'></Image>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




