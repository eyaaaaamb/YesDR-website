<?php
session_start();
$idP=$_SESSION['id'];
include "../cnx.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();}
// - selection de dr -->

$sql_m="SELECT * FROM medecins ";
$res_m=$cnx->query($sql_m);
$dr=$res_m->fetchAll();
$nb=count($dr);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="../img/logo_blue.png" type="image/x-icon">
  <title>Doctors list</title>
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
        <li><a href="records.php">Records</a></li>

        <li style="text-decoration:underline"><a href="dr.php">Doctors</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
      </ul>
    </nav>
  </header>

  <div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
     
    <h1>Our  doctors</h1>
</div>
    <div class="table-container">
  
    <?php //tab
    if($nb==0){
        echo"<hr><b>Aucune patients dans la liste</b>";

    }else{
        
        echo"<table><thead><tr><th> id  </th><th> image</th><th>first name </th><th> last name</th><th> email</th><th> rrps</th><th> speciality</th></tr>
        </thead>";
       
        foreach($dr as $item){
          echo "<tr>
                 <td>".$item['idM']."</td>
                <td><img src='../img/".$item['img']."' alt='Doctor Image' style='width:50px;height:50px;object-fit:cover;border-radius:50%;'></td>
                <td>".$item['nomM']."</td>
                <td>".$item['prenomM']."</td>
                <td>". $item['emailM']."</td>
                <td>".$item['rpps']."</td>
                 <td>".$item['specialite']."</td>
                
                </tr>";
      }
      
        echo"</table><hr>";
    }
      ?>  
    
    </div>
  </div>
 
</body>
</html>