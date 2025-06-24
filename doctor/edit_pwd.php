<?php
$id=$_POST['id'];
$pwd= $_POST['newPassword'];     
include"../cnx.php";

$q="UPDATE  medecins Set passwordM='$pwd' WHERE idM=$id";
$cnx->exec($q);
header("Location:profile.php");
?>