<?php
session_start();
$idP=$_SESSION['id'];
include "../cnx.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();}

// - selection des patients -->
$sql_a="SELECT * FROM appointments where idP=$idP ";
$res_a=$cnx->query($sql_a);
$app=$res_a->fetchAll();
$nb_a=count($app);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Appointments</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header>
  <div class="logo"><img src="../img/img.png" alt="" style="height:40PX;width:70px">
  </div>
    <nav>
      <ul>
      <li><a href="index.php">Dashboard</a></li>
        <li style="text-decoration:underline"><a href="appointments.php">Appointments</a></li>
        <li><a href="records.php">Records</a></li>

        <li><a href="dr.php">Doctors</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
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
        echo"<hr><b>there is no appoitments</b>";

    }else{
       
        echo"<table><thead><tr><th> id  </th><th> doctor name </th><th> date </th><th> notes </th><th> action </th> </tr>
        </thead>";
       
        foreach($app as $item){
        $id = $item['idM'];
        $dr="SELECT CONCAT(nomM, ' ',prenomM) as full FROM medecins where idM=$id";
         $res_dr=$cnx->query($dr);
         $idDr=$res_dr->fetch();
          echo"<tr><td>".$item['idA'] ."</td><td>".$idDr['full']."</td><td>".$item['dateA'] ."</td><td>".$item['notesA'] ."</td>
          <td>
                    <span class='action-icon delete' onclick=\"window.location.href='supp_app.php?id=".$item['idA']."'\">🗑️</span>
                     <span class='action-icon delete' onclick=\"window.location.href='update_app.php?id=".$item['idA']."'\">✏️</span>

                  </td></tr>";

        }
        echo"</table><hr>";
    }
      ?>  
    </div>
  </div>


</body>
</html>