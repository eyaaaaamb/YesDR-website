<?php
$id=$_POST['id'];
 $fname= $_POST['firstName'];     
 $lname = $_POST['lastName']; 
$gender=$_POST['gender'] ;
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $birthDate=$_POST['birthDate'];

include"../cnx.php";
//string ''
$q="UPDATE  patients Set nomP='$fname', prenomP='$lname', emailP='$email',phone='$phone',dateP='$birthDate',sexeP='$gender' WHERE idP=$id";
$cnx->exec($q);
header("Location:patients.php");
?>