<?php
session_start();
$idM=$_SESSION['id'];
include "../cnx.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
$cnx = new PDO("mysql:host=$db_server;dbname=$db_name", $db_username, $db_pwd);
// - selection des dossiers -->
$sql_d = "SELECT d.*, a.idP, p.nomP
FROM dossiers d
JOIN appointments a ON d.idA = a.idA
JOIN patients p ON a.idP = p.idP
WHERE a.idM = $idM
ORDER BY a.idP";

$res_d=$cnx->query($sql_d);
$dossiers=$res_d->fetchAll();
$nb_d=count($dossiers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medical Records</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
  <div class="logo"><img src="../img/img.png" alt="" style="height:40PX;width:70px">
  </div>
    <nav>
      <ul>
      <li><a href="index.php">Dashboard</a></li>
        <li><a href="patients.php">Patients</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li style="text-decoration:underline"><a href="records.php">Records</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
      </ul>
    </nav>
  </header>

  <div class="container">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
  <h1>Medical Records</h1>
      <button  class="btn " onclick="window.location.href='add_record.php'">Add New Record</button>

    </div>
   
    <div class="table-container">
 
    <?php //tab
    if($nb_d==0){
        echo"<hr><b>Aucune dossiers dans la liste</b>";

    }else{
        
       
       
        $current_idP = null;

foreach ($dossiers as $item) {
    if ($current_idP !== $item['idP']) {
        $current_idP = $item['idP'];
        echo "<h2 style='margin-bottom:20px' >Patient: " . htmlspecialchars($item['nomP']) . " (ID: " . $item['idP'] . ")</h2>";
        echo "<table style='margin-bottom:40px'>
                <thead>
                  <tr>
                    <th>Record ID</th>
                    <th>Appointment ID</th>
                    <th>Diagnosis</th>
                    <th>Treatment</th>
                    <th>Prescriptions</th>
                    <th>Action</th>
                  </tr>
                </thead>";
    }

    echo "<tr>
            <td>" . $item['idD'] . "</td>
            <td>" . $item['idA'] . "</td>
            <td>" . htmlspecialchars($item['diagnosis']) . "</td>
            <td>" . htmlspecialchars($item['treatment']) . "</td>
            <td>" . htmlspecialchars($item['prescriptions']) . "</td>
            <td>
              <span class='action-icon delete' onclick=\"window.location.href='supp_records.php?id=" . $item['idD'] . "'\">🗑️</span>
              <span class='action-icon delete' onclick=\"window.location.href='update_dossier.php?id=" . $item['idD'] . "'\">✏️</span>
            </td>
          </tr>";

    // Close table if it's the last record or the next patient is different
    $next = next($dossiers);
    if (!$next || $next['idP'] !== $current_idP) {
        echo "</table><hr>";
    }
}

      
        echo"</table><hr>";
    }
      ?>  
    
    </div>
  </div>


  

 

  <script src="../js/script.js"></script>
</body>
</html>