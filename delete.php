<?php
try {
    require_once 'conn.php';
    $id =  $_POST["id"];
    mysqli_query($conn, "delete from bookDetails where Id = '$id';");
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