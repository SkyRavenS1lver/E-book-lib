<?php
$id = $_POST['id'];
require_once 'conn.php';
$sql = "select * from bookdetails where id= '$id'";
$result = $connection->query($sql);
$data = mysqli_fetch_object($result);
echo json_encode(['data'=>$data]);
?>
