<?php
include "../cnx.php";
if (isset($_POST['save'])) {
    $idA= $_POST['idA'];     
    $diagnosis=$_POST['diagnosis'] ;
    $treatment=$_POST['treatment'];
    $prescription=$_POST['prescriptions'];
    $sql_d = "INSERT INTO dossiers(idD,idA,diagnosis,treatment,prescriptions)
     VALUES (NULL,$idA, '$diagnosis','$treatment','$prescription')";
    $cnx->exec($sql_d);
    header("Location:records.php");

}
?>