<?php
try {
    require_once 'conn.php';
    $id =  $_POST["idBuku"];
    $title = $_POST["title"];
    $writer = $_POST["writer"];
    $publisher = $_POST["penerbit"];
    $year = $_POST["tahun"];
    $harga = $_POST["harga"];    
    $halaman = $_POST["halaman"];
    if ($_POST["genre"] == "Other"){$genre = $_POST["others"];}
    else{$genre = $_POST["genre"];}
    mysqli_query($conn, "update bookDetails set Judul = '$title', Penulis = '$writer',
    Penerbit = '$publisher', TahunTerbit = '$year', JumlahHalaman = '$halaman', HargaBeli = '$harga', Genre = '$genre' where Id = '$id';");
    echo '<script>alert("Data berhasil diubah!")</script>';
    }
catch(Exception $e){
    echo '<script>alert("Maaf id buku sudah terdaftar!")</script>';
}
?>
<script>
    setInterval( () => {
    window.location.href = 'view.php';
}, 500);
</script>