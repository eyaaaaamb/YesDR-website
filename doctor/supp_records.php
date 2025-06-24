<?php
session_start();
$idM=$_SESSION['id'];
$id=$_GET["id"];
include "../cnx.php";
$cnx = new PDO("mysql:host=$db_server;dbname=$db_name", $db_username, $db_pwd);

//supp
$q="DELETE from dossiers where idD=$id";
$cnx->exec($q);
//redirection a la page principale (dans le meme dossier)
header("Location:records.php");
?>