<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
$id=$_POST['id'];
 $fname= $_POST['firstName'];     
 $lname = $_POST['lastName']; 

 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $birthDate=$_POST['birthDate'];

include"../cnx.php";
//string ''
$q="UPDATE  patients Set nomP='$fname', prenomP='$lname', emailP='$email',phone='$phone',dateP='$birthDate' WHERE idP=$id";
$cnx->exec($q);
header("Location:profile.php");
exit();
?>