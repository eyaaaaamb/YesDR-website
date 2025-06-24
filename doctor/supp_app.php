<?php

$id=$_GET["id"];
include "../cnx.php";
$cnx = new PDO("mysql:host=$db_server;dbname=$db_name", $db_username, $db_pwd);

//supp
$q="DELETE from appointments where idA=$id";
$cnx->exec($q);
//redirection a la page principale (dans le meme dossier)
header("Location:appointments.php");
?>