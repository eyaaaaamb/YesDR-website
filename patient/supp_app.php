<?php
$id=$_GET["id"];
include "../cnx.php";
//supp
$q="DELETE from appointments where idA=$id";
$cnx->exec($q);
header("Location:appointments.php");
?>