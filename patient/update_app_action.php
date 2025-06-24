<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
$id=$_POST['id'];
 $date= $_POST['appointmentDate'];     
 $notes = $_POST['notes']; 
include"../cnx.php";
//string ''
$q="UPDATE  appointments Set dateA='$date', notesA='$notes' WHERE idA=$id";
$cnx->exec($q);
header("Location:appointments.php");
?>