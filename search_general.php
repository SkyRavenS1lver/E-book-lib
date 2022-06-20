<?php
$pilihan = $_POST['pilihan'];
$search = $_POST['search'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
    <title>Latihan Database PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>td{font-size: 15px;}</style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="LandingPage.html">Home</img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Catalogue</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="login.html">Login</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    <center><div style="width: 500px; height:75px; margin-top:10%;margin-bottom:10%;"><h1 style="padding-top: 5px; color:azure; font-size: 75px;">CATALOGUE E-BOOK</h1></div></center>
    <div class="p-3 mb-2 bg-dark text-white row justify-content-center">
    <form class="form-inline" action= "search_general.php" method="POST" style="background-color: transparent;">
        <label for="pilihan"><pre style="font-size: 30px; color:azure; font-family: 'Kdam Thmor Pro', sans-serif;padding-top: 15px;">Search By:    </pre></label>
        <select name="pilihan" id="pilihan" style="margin-right: 20px; height: 45px;">
            <option value="Id">Id</option>
            <option value="Judul" selected>Judul</option>
            <option value="Penulis">Penulis</option>
            <option value="TahunTerbit">Tahun Terbit</option>
            <option value="Genre">Genre</option>
        </select>
        <input class="form-control ml-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search" style="height: 45px; border-radius: 5px 0px 0px 5px;">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="height: 45px; border-radius: 0 5px 5px 0;">Search</button>
    </form>
    </div>
    <div style="display: flex;
                align-items: center;
                justify-content: center;">
    <table class="table col-md-8" style="color: azure; font-size: 21px;">
        <thead>
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Genre</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Halaman</th>
            <th>Harga Beli</th>
            <th colspan="2"><center>Opsi</center></th>
        </tr>
        </thead>
        <?php
            include 'conn.php';
            $data = mysqli_query($conn,"select distinct * from bookdetails where ".$pilihan." like '%".$search."%'");
            if ($data->num_rows == 0){echo '<script>alert("Data Tidak Ditemukan");window.location.href="view_general.php";</script>';}
            foreach($data as $value){
                echo"
                <tr>
                    <td>".$value['Id']."</td>
                    <td>".$value['Judul']."</td>
                    <td>".$value['Penulis']."</td>
                    <td>".$value['Genre']."</td>
                    <td>".$value['Penerbit']."</td>
                    <td>".$value['TahunTerbit']."</td>
                    <td>".$value['JumlahHalaman']."</td>
                    <td>".$value['HargaBeli']."</td>
                    <td><button class='btn btn-success' onclick=\"window.location.href='beli.php'\" type='button' id='beli'>Beli</button></td>
                </tr>
                ";
            }  
        ?>
    </table>
    </div>
</body>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</html>