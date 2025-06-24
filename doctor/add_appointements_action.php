<?php
session_start();
$idM=$_SESSION['id'];
include "../cnx.php";
if (isset($_POST['save'])) {
    $idP= $_POST['idP'];     
    $date=$_POST['appointmentDate'];
    $notes=$_POST['notes'];
    $sql_a = "INSERT INTO appointments(idA,idM,idP,dateA,notesA)
     VALUES (NULL,$idM, $idP,'$date','$notes')";
    $cnx->exec($sql_a);
    header("Location:appointments.php");

}
?>