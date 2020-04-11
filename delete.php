<?php 
session_start();
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($connect, "DELETE FROM `data` WHERE id='$id'");
    
    header('location: index.php');
}

?>