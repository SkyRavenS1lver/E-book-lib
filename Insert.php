<?php
session_start();
$_SESSION["idBuku"] =  $_POST["idBuku"];
$_SESSION["title"] = $_POST["title"];
$_SESSION["writer"] = $_POST["writer"];
$_SESSION["penerbit"] = $_POST["penerbit"];
$_SESSION["tahun"] = $_POST["tahun"];
$_SESSION["harga"] = $_POST["harga"];    
$_SESSION["halaman"] = $_POST["halaman"];
if ($_POST["genre"] == "Other"){$_SESSION["genre"] = $_POST["others"];
$_SESSION["Other"] = $_POST["genre"];}
else{$_SESSION["genre"] = $_POST["genre"];}
try {
    require_once 'conn.php';
    $id =  $_SESSION["idBuku"];
    $title = $_SESSION["title"];
    $writer = $_SESSION["writer"];
    $publisher = $_SESSION["penerbit"];
    $year = $_SESSION["tahun"];
    $harga = $_SESSION["harga"];    
    $halaman = $_SESSION["halaman"];
    $genre = $_SESSION["genre"];
    mysqli_query($conn, "INSERT INTO bookDetails (Id, Judul, Penulis,Penerbit, TahunTerbit, JumlahHalaman, HargaBeli, Genre)
    VALUES ('$id','$title', '$writer','$publisher','$year', '$halaman','$harga', '$genre');");
    session_unset();
    echo '<script>alert("Data berhasil ditambahkan!")</script>';
    }
catch(Exception $e){
    echo '<script>alert("Maaf id buku sudah terdaftar!")</script>';
}
?>
<script>
    setInterval( () => {
    window.location.href = 'inserting.php';
}, 500);
</script>