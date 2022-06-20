<?php
require_once 'conn.php';
$user = $_POST['username'];
$pw = $_POST['password'];
$result = mysqli_query($conn, "select * from user limit 1");
foreach ($result as $value){
    if ($user == $value['Username']){
        if ($pw == $value['Password']){
            echo '<script>alert("Login Berhasil")</script>';
                echo '<script> setInterval( () => { window.location.href = "view.php";}, 500);</script>';
            }
            else{echo '<script>alert("Password Salah!")</script>';echo '<script> setInterval( () => { window.location.href = "login.html";}, 500);</script>';}
        }
        else{echo '<script>alert("Username Salah!")</script>';echo '<script> setInterval( () => { window.location.href = "login.html";}, 500);</script>';}
}
?>