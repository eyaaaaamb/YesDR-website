<?php
session_start();
$idP=$_SESSION['id'];
if (!isset($idP)) {
    header("Location: ../index.php");
    exit();
}
include "../cnx.php";

if (isset($_POST['save'])) {
    $idM = $_POST['idM'];
    $date = $_POST['appointmentDate'];
    $notes = $_POST['notes'];

    $sql_a = "INSERT INTO appointments(idA, idM, idP, dateA, notesA)
              VALUES (NULL, $idM, $idP, '$date', '$notes')";
    $cnx->exec($sql_a);
    header("Location: appointments.php");
}

    
?>