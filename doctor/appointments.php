<?php
session_start();
$idM=$_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();
}
include "../cnx.php";
// - selection des patients -->
$sql_a="SELECT * FROM appointments  where idM=$idM";
$res_a=$cnx->query($sql_a);
$app=$res_a->fetchAll();
$nb_a=count($app);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Appointments Management</title>
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
        <li style="text-decoration:underline"><a href="appointments.php">Appointments</a></li>
        <li><a href="records.php">Records</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../index.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
      <h1>Appointments Management</h1>
      <button  class="btn " onclick="window.location.href='add_appointments.php'">Add New appoitments</button>
    </div>
    
  
    <div class="table-container">
 
    <?php //tab
    if($nb_a==0){
        echo"<hr><b>Aucune rendez vous dans la liste</b>";

    }else{
        
        echo"<table><thead><tr><th> Appointment ID </th><th>Patient ID</th><th> Patient Name</th><th>Date & Time</th><th>Notes</th><th>action</th></tr>
        </thead>";
       
        foreach($app as $item){
          $sql="SELECT nomP FROM patients WHERE idP=".$item['idP'];
          $res = $cnx->query($sql);  
          $nom = $res->fetch();
          
          echo "<tr>
                  <td>".$item['idA']."</td>
                  <td>".$item['idP']."</td>
                  <td>".$nom['nomP']."</td>
                  <td>".$item['dateA']."</td>
                  <td>".$item['notesA']."</td>
                  <td>
                
                    <span class='action-icon delete' onclick=\"window.location.href='supp_app.php?id=".$item['idA']."'\">🗑️</span>
                     <span class='action-icon delete' onclick=\"window.location.href='update_app.php?id=".$item['idA']."'\">✏️</span>

                  </td>

                </tr>";
      }
      
        echo"</table><hr>";
    }
      ?>  
    
   
    
  </div>

 
  

  
  

  <script src="../js/script.js"></script>
</body>
</html>