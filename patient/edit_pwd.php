<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
$id=$_POST['id'];
$pwd= md5($_POST['newPassword']);     
include"../cnx.php";
//string ''
$q="UPDATE  patients Set passwordP='$pwd' WHERE idP=$id";
$cnx->exec($q);
header("Location:profile.php");
?>