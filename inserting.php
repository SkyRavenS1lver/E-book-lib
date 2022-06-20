<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    if (!isset($_SESSION["idBuku"])) {
        $_SESSION["idBuku"] = "";
    }
    if (!isset($_SESSION["title"])) {
        $_SESSION["title"] = "";
    }
    if (!isset($_SESSION["writer"])) {
        $_SESSION["writer"] = "";
    }
    if (!isset($_SESSION["halaman"])) {
        $_SESSION["halaman"] = "";
    }
    if (!isset($_SESSION["penerbit"])) {
        $_SESSION["penerbit"] = "";
    }
    if (!isset($_SESSION["harga"])) {
        $_SESSION["harga"] = "";
    }
    if (!isset($_SESSION["tahun"])) {
        $_SESSION["tahun"] = "";
    }
    ?>
    <head>
        <?php include 'conn.php';?>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kdam+Thmor+Pro&display=swap" rel="stylesheet">
    <title>Latihan Database PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style> body{font-size: 15px;}</style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top" style="font-size: 30px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="LandingPage.html"><img src="asset/logo-removebg-preview.png" style="height: 50px; width: 50px;"></img></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="view.php">View</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Add Data</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
        <center><h1 style="margin-top: 5%; font-size: 50px;">Tambah Buku Baru</h1></center>
        <div style="padding-top: 10px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 10px;">
        <form id="formInsert" action="insert.php" method="POST" style="width: 700px;">
            <div class="mb-3">
              <label for="id" class="form-label">Id Buku</label>
              <input type="text" class="form-control" id="id" name="idBuku" pattern="[0-9]+" value='<?php echo $_SESSION["idBuku"];?>' required>
            </div>
            <div class="mb-3">
              <label for="judul_buku" class="form-label">Judul Buku</label>
              <input type="text" class="form-control" id="judul_buku" name="title" value='<?php echo $_SESSION["title"];?>' required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="writer" value='<?php echo $_SESSION["writer"];?>' required>
            </div>

            <label for="genres" class="form-label" >Pilih Genre</label>
            <div id="genreField">
                <select class="form-select form-select-lg" aria-label="Default select example" name="genre" id="genres" style="width: 150px; height: 30px;">
                    <?php
                    $genres = mysqli_query($conn, "select distinct Genre from bookdetails");
                    foreach($genres as $genre){ 
                    echo'<option class="dropdown-item" value="'.$genre['Genre'].'">'.$genre['Genre'].'</option>';}
                    ?>
                    <option class="dropdown-item" value="Other" id="Lain-lain"selected>Lain-lain</option>
                </select>
                
                <div class="mb-3">
                    <input type="text" class="form-control" id="otherField" name="others" disabled required>
                </div>
            </div>
            <div class="mb-3">
                <label for="JumlahHal" class="form-label" >Jumlah Halaman</label>
                <input type="text" class="form-control" id="JumlahHal" name="halaman" pattern="[0-9]+" value='<?php echo $_SESSION["halaman"];?>' required>
            </div>
            <div class="mb-3">
                <label for="HargaBukku" class="form-label" >Harga Buku</label>
                <input type="text" class="form-control" id="HargaBuku" name="harga" pattern="[0-9]+" value='<?php echo $_SESSION["harga"];?>' required>
            </div>
            <div class="mb-3">
                <label for="Penerbit" class="form-label" >Penerbit</label>
                <input type="text" class="form-control" id="Penerbit" name="penerbit" value='<?php echo $_SESSION["penerbit"];?>' required>
            </div>
            <div class="mb-3">
                <label for="Tahun" class="form-label" >Tahun Terbit</label>
                <input type="text" class="form-control" id="Tahun" name="tahun" pattern="[0-9]+" minlength="4" maxlength="4" value='<?php echo $_SESSION["tahun"];?>' required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" onclick="window.location.href='view.php'" class="btn btn-secondary ml-3">Back</button>
        </form>
    </div>



    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script type="text/javascript">
        if ($('#genres').val() == 'Other'){$('#otherField').attr('disabled',false);}
        $("#genres").change(function(){
          var val = $(this).val()
          if (val == "Other") {
            $('#otherField').attr('disabled',false);
          } else {
            $('#otherField').attr('disabled',true);
            $('#otherField').val("");
            }
        });
    </script>
    </body>

</html>