<?php
session_start(); 
include "cnx.php";
$role = $_POST['role'];
$email = $_POST['email'];
$mdp1 = $_POST['mdp'];
$mdp=md5($mdp1);


if ($role == "doctor") {
    $res = $cnx->query("SELECT * FROM medecins WHERE emailM='$email' AND passwordM='$mdp'");
    $med = $res->fetch();

} elseif ($role == "patient") {
    $res = $cnx->query("SELECT * FROM patients WHERE emailP='$email' AND passwordP='$mdp'");
    $patient = $res->fetch();

} else {
    echo "Select your role!";
    exit;
}

if ($med) {
    $_SESSION['id'] = $med['idM'];
    header("Location: doctor/index.php");
    exit;

} elseif ($patient) {
    $_SESSION['id'] = $patient['idP'];
    header("Location: patient/index.php");
    exit;

} else {
    $_SESSION['login_error'] = "please verify your email and your password !";
  header("Location:login.php"); 
exit;

}
?>
