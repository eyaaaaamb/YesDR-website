<?php
session_start();
$idP=$_SESSION['id'];
include "../cnx.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();}
// - selection des dossiers -->


$sql_d="SELECT d.*
FROM dossiers d
JOIN appointments a ON d.idA = a.idA
WHERE a.idP = $idP";
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
        <li><a href="appointments.php">Appointments</a></li>
        <li style="text-decoration:underline"><a href="records.php">Records</a></li>

        <li><a href="dr.php">Doctors</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
      </ul>
    </nav>
  </header>

  <div class="container">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
  <h1>Medical Records</h1>
     
    </div>
   
    <div class="table-container">
  
    <?php //tab
    if($nb_d==0){
        echo"<hr><b>Aucune dossiers dans la liste</b>";

    }else{
        
        echo"<table><thead><tr><th> id  </th><th>idA</th><th>dignosis</th><th> treatment </th><th>prescriptions</th></tr>
        </thead>";
       
        foreach($dossiers as $item){
          echo "<tr>
                  <td>".$item['idD']."</td>
                  <td>".$item['idA']."</td>
                  <td>".$item['diagnosis']."</td>
                  <td>".$item['treatment']."</td>
                  <td>".$item['prescriptions']."</td>
               

                </tr>";
      }
      
        echo"</table><hr>";
    }
      ?>  
    
    </div>
  </div>


  

 


</body>
</html>