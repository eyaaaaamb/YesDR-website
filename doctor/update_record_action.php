<?php
$id=$_POST['id'];
 $diagnosis= $_POST['diagnosis'];     
 $treatment = $_POST['treatment']; 
 $prescriptions=$_POST['prescriptions'];
include"../cnx.php";
//string ''
$q="UPDATE  dossiers Set diagnosis='$diagnosis', treatment='$treatment',prescriptions='$prescriptions' WHERE idD=$id";
$cnx->exec($q);
header("Location:records.php");
?>