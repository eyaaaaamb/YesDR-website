<?php
include "../cnx.php";
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST['save'])) {
    $fname= $_POST['firstName'];     
    $lname = $_POST['lastName']; 
    $gender=$_POST['gender'] ;
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $birthDate=$_POST['birthDate'];
    $password=md5($_POST['password']);   

    
    $sql_p = "INSERT INTO patients(idP,nomP,prenomP,sexeP,emailP,phone,dateP,passwordP)
     VALUES (NULL, '$fname', '$lname','$gender','$email','$phone','$birthDate','$password')";
    $cnx->exec($sql_p);
    header("Location:patients.php");

}
?>