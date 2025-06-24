<?php

session_start();
$idP=$_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();}
// var_dump($idP);
include "../cnx.php";
$q="SELECT  CONCAT(nomP, ' ', prenomP) as full_name FROM patients where idP=$idP";
$res=$cnx->query($q);
$fname=$res->fetch();

$sql_today="SELECT * FROM appointments  where DATE(dateA) = CURDATE() and idP=$idP";
$res_today=$cnx->query($sql_today);
$today=$res_today->fetchAll();
$nb_a=count($today);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_blue.png" type="image/x-icon">
  <title>Patient Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
  <div class="logo"><img src="../img/img.png" alt="" style="height:40PX;width:70px">
  </div>
    <nav>
      <ul>
      <li style="text-decoration:underline"><a href="index.php">Dashboard</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li><a href="records.php">Records</a></li>

        <li><a href="dr.php">Doctors</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1> Welcome  <?php echo $fname['full_name'] ?></h1>
    
    <div class="card-container">
      <div class="card">
        <h3>Upcoming Appointments</h3>
        <p><?php echo $nb_a ?></p>
        <a href="appointments.php" class="btn">View All</a>
      </div>
    </div>
    
    <h2>Today's Appointments</h2>
    <div class="table-container">
    <?php //tab
    if($nb_a==0){
        echo"<hr><b>there is no appoitments for today</b>";

    }else{
       
        echo"<table><thead><tr><th> id  </th><th> doctor name </th><th> date </th><th> notes </th> </tr>
        </thead>";
       
        foreach($today as $item){
        $id = $item['idM'];
        $dr="SELECT CONCAT(nomM, ' ',prenomM) as full FROM medecins where idM=$id";
         $res_dr=$cnx->query($dr);
         $idDr=$res_dr->fetch();
          echo"<tr><td>".$item['idA'] ."</td><td>".$idDr['full']."</td><td>".$item['dateA'] ."</td><td>".$item['notesA'] ."</td></tr>";

        }
        echo"</table><hr>";
    }
      ?>  
    </div>
  </div>

 

  <script src="../js/script.js"></script>
</body>
</html>