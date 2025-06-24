<?php
session_start();
$idM=$_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();}
include "../cnx.php";

// - selection des patients -->

$sql_p="SELECT * FROM patients ";
$res_p=$cnx->query($sql_p);
$patients=$res_p->fetchAll();
$nb_p=count($patients);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patients Management</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
  <div class="logo"><img src="../img/img.png" alt="" style="height:40PX;width:70px">
  </div>
    <nav>
      <ul>
      <li><a href="index.php">Dashboard</a></li>
        <li style="text-decoration:underline"><a href="patients.php">Patients</a></li>
        <li><a href="appointments.php">Appointments</a></li>
        <li><a href="records.php">Records</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
      </ul>
    </nav>
  </header>

  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
      <h1>Patients Management</h1>
      <button  class="btn " onclick="window.location.href='add_patients.php'">Add New Patient</button>

    </div>
    
    <div class="table-container">

    <?php //tab
    if($nb_p==0){
        echo"<hr><b>Aucune patients dans la liste</b>";

    }else{
        
        echo"<table><thead><tr><th> id  </th> <th> image  </th><th> first name </th><th>last name</th><th> sexe </th><th> email</th><th> phone</th><th> birthDate</th><th>action</th></tr>
        </thead>";
       
        foreach($patients as $item){
          echo "<tr>
                  <td>".$item['idP']."</td>
                  <td><img src='../img/".$item['img']."' alt='Doctor Image' style='width:50px;height:50px;object-fit:cover;border-radius:50%;'></td>
                  <td>".$item['nomP']."</td>
                  
                  <td>".$item['prenomP']."</td>
                  <td>".$item['sexeP']."</td>
                  <td>".$item['emailP']."</td>
                  <td>".$item['phone']."</td>
                  <td>".$item['dateP']."</td>
                  <td>
                    <span class='action-icon delete' onclick=\"window.location.href='supp_patients.php?id=".$item['idP']."'\">🗑️</span>
                     <span class='action-icon delete' onclick=\"window.location.href='update_patients.php?id=".$item['idP']."'\">✏️</span>

                  </td>

                </tr>";
      }
      
        echo"</table><hr>";
    }
      ?>  
    
    </div>
  </div>
 
</body>
</html>