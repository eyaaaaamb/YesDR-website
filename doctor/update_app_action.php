<?php
$id=$_POST['id'];
 $date= $_POST['appointmentDate'];     
 $notes = $_POST['notes']; 
include"../cnx.php";
//string ''
$q="UPDATE  appointments Set dateA='$date', notesA='$notes' WHERE idA=$id";
$cnx->exec($q);
header("Location:appointments.php");
?>