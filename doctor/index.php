
<?php

session_start();
$idM = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();}
include "../cnx.php";

// Select appointments for the doctor
$sql_a = "SELECT * FROM appointments WHERE idM =$idM";
$res_a = $cnx->query($sql_a);
$appointments = $res_a->fetchAll();
$nb_a = count($appointments);

// Create an empty array to store appointment IDs
$ids = [];

// Loop through each appointment and get the 'idA'
foreach ($appointments as $appointment) {
    $ids[] = $appointment['idA'];
}

// Join the IDs into a single comma-separated string
$appointment_ids = implode(',', $ids);

// If we have some IDs, run the query
if (!empty($appointment_ids)) {
    // Get all dossiers where idA is in the list of IDs
    $sql_d = "SELECT * FROM dossiers WHERE idA IN ($appointment_ids)";
    $res_d = $cnx->query($sql_d);
    $dossiers = $res_d->fetchAll(); // Turn the result into an array
    $nb_d = count($dossiers);       // Count how many dossiers we got
} else {
    // No appointments, so no dossiers
    $dossiers = [];
    $nb_d = 0;
}


// Select patients
$sql_p = "SELECT * FROM patients";
$res_p = $cnx->query($sql_p);
$patients = $res_p->fetchAll();
$nb_p = count($patients);

// Select today's appointments
$sql_today = "SELECT * FROM appointments WHERE DATE(dateA) = CURDATE() and idM = $idM";
$res_today = $cnx->query($sql_today);
$today = $res_today->fetchAll();

// Select doctor name
$q = "SELECT CONCAT(nomM, ' ', prenomM) as full_name FROM medecins WHERE idM = $idM";
$res = $cnx->query($q);
$fname = $res->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/logo_blue.png" type="image/x-icon">
  <title>Doctor Dashboard</title>
  <link rel="stylesheet" href="../css/style.css">

  
</head>
<body>
  <header>
  <div class="logo"><img src="../img/img.png" alt="" style="height:40PX;width:70px">
     </div>
    <nav>
      <ul>
      <li style="text-decoration:underline"><a href="index.php" >Dashboard</a></li>
        <li><a href="patients.php">Patients</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li><a href="records.php">Records</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
      </ul>
    </nav>
  </header>

  <div class="container">
  <h1> Welcome dr <?php echo $fname['full_name'] ?></h1>
    
    <div class="card-container">
      <div class="card">
        <h3>Total Patients</h3>
        <p id="totalPatients"><?php  echo $nb_p ?></p>
        <a href="patients.php" class="btn">View More</a>
      </div>
      
      <div class="card">
        <h3>Total Appointments</h3>
        <p id="totalAppointments"><?php echo  $nb_a ?></p>
        <a href="appointments.php" class="btn">View More</a>
      </div>
      
      <div class="card">
        <h3>Total Records</h3>
        <p id="totalRecords"><?php echo $nb_d ?></p>
        <a href="records.php" class="btn">View More</a>
      </div>
    </div>
    <div class="table-container">
       <?php //tab
    if($nb_a==0){
        echo"<hr><b>there is no appoitments for today</b>";

    }else{
        echo"<hr><h2>Today's Appointments</h2>";
        echo"<table><thead><tr><th> id  </th><th> Patient name </th><th> date </th><th> notes </th> </tr>
        </thead>";
       
        foreach($today as $item){
          $id = $item['idP'];
          $dr="SELECT CONCAT(nomP, ' ',prenomP) as full FROM patients where idP=$id";
           $res_dr=$cnx->query($dr);
           $idpa=$res_dr->fetch();
         
          echo"<tr><td>".$item['idA'] ."</td><td>".$idpa['full']."</td><td>".$item['dateA'] ."</td><td>".$item['notesA'] ."</td></tr>";

        }
        echo"</table><hr>";
    }
      ?>  
    
    </div>
  </div>



  
</body>
</html>