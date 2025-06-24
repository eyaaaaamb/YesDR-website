<?php
$id=$_POST['id'];
 $fname= $_POST['firstName'];     
 $lname = $_POST['lastName']; 
 $email=$_POST['email'];
 $rpps=$_POST['phone'];
 $specialite=$_POST['specialite'];

include"../cnx.php";
//string ''
$q="UPDATE  medecins Set nomM='$fname', prenomM='$lname', emailM='$email',rpps='$rpps',specialite='$specialite' WHERE idM=$id";
$cnx->exec($q);
header("Location:profile.php");
?>