<?php 
session_start();
$id=$_SESSION['id'];
include "../cnx.php";
if (!isset($_SESSION['id'])) {
    header("Location: ../login.php");
    exit();}
$sql="SELECT * FROM medecins where idM=$id";
$res=$cnx->query($sql);
$dr=$res->fetch();
$pwd=$dr['passwordM'];

if (isset($_SESSION['msg'])) {
    echo "<p class='success' style='color: green;'>" . $_SESSION['msg'] . "</p>";
    unset($_SESSION['msg']); 
}

if (isset($_SESSION['error'])) {
    echo "<p class='error' style='color: red;'>" . $_SESSION['error'] . "</p>";
    unset($_SESSION['error']); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


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
        <li><a href="records.php">Records</a></li>
        <li style="text-decoration:underline"><a href="profile.php">Profile</a></li>
        <li><a href="../logout.php">Logout</a></li> 
      </ul>
    </nav>
  </header>

  <div class="container">
    <h1>My Profile</h1>
    <div class="table-container">
      
     <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 20px;">
  <img src="../img/<?php echo ($dr['img']); ?>" alt="Doctor Image" 
       style="width:120px; height:120px; object-fit:cover; border-radius:50%; margin-right: 10px;">
  
 <!-- form sans buttom bil onchange -->
  <form action="update_pdp.php" method="post" enctype="multipart/form-data" style="display: inline-block;">
    <label for="pdpUpload" style="cursor: pointer; display: inline-block;">
      <i class="fas fa-pen" style="color: white; background: #333; padding: 5px; border-radius: 50%; font-size: 14px;"></i>
    </label>
    <input type="file" name="newPdp" id="pdpUpload" style="display: none;" onchange="this.form.submit()">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
  </form>
</div>
<table>
        <tr>
          <th>Doctor ID</th>
          <td><?php echo $dr['idM'] ?></td>
        </tr>
        <tr>
          <th>First name</th>
          <td><?php echo $dr['nomM']  ?></td>
        </tr>
        <tr>
          <th>Last name</th>
          <td><?php echo $dr['prenomM']  ?></td>
        </tr>
        
        <tr>
          <th>Email</th>
          <td><?php echo $dr['emailM'] ?></td>
        </tr>
        <tr>
          <th>RPPS</th>
          <td><?php echo $dr['rpps'] ?></td>
        </tr>
        <tr>
          <th>speciality</th>
          <td><?php echo $dr['specialite'] ?></td>
        </tr>
      </table>
      <button class="btn" style="margin-top: 10px;" onclick="window.location.href='edit_profile.php?id=<?php echo $dr['idM']; ?>'">Edit Profile</button>
    </div>
    
    <h2 style="margin-top: 30px;margin-bottom: 20px;">Change Password</h2>
    <div class="table-container">
      <form action="edit_pwd.php" method="post">
       
        <div class="form-group">
          <label for="currentPassword">Current Password</label>
          <input type="password"   id="currentPassword" name="currentPassword" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="newPassword">New Password</label>
          <input type="password "  class="champ" id="newPassword" name="newPassword" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm New Password</label>
          <input type="password "class="champ" id="confirmPassword" name="confirmPassword" autocomplete="off" required>
        </div>
        <div class="form-actions" style="margin-top: 10px;">
        <input type="hidden" name="id" value="<?php echo($id); ?>">
          <button type="submit" id="submit" class="btn"  >Update Password</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.19.0/js/md5.min.js"></script>
  <script >
    //pwd
 
 
  var serverPassword = "<?php echo $pwd; ?>";
 $mdp=$('#newPassword'),
 $confirmation = $('#confirmPassword'),
$erreur =$("#erreur"),
 $champ =$(".champ"),
 $envoi =$("#submit");



$champ.keyup(function(){

 if($(this).val().length < 5){ 
 
 $(this).css({ 
 borderColor: 'red',
 color: 'red' });
 } else{ 
     $(this).css({ 
      borderColor: 'green', 
      color: 'green' 
     });
 
 }
 
 });
$confirmation.keyup(function(){

     if($(this).val() != $mdp.val()){
         $(this).css({    
     borderColor: 'red',
     color : 'red'   });
          } else{
     $(this).css({ 
         borderColor: 'green', 
          color: 'green' });
         
    
 }        
});

$('#currentPassword').on('keyup', function() {
  var inputVal = $(this).val();
  var hashedInput = md5(inputVal);
  
  if (hashedInput !== serverPassword) {
    $(this).css({ borderColor: 'red', color: 'red' });
  } else {
    $(this).css({ borderColor: 'green', color: 'green' });
  }
});
;



 
  </script>
</body>
</html>