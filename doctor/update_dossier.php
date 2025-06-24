<?php
$id=$_GET["id"];
include "../cnx.php";
$q="SELECT * from dossiers WHERE idD=$id";
$res=$cnx->query($q);
$records=$res->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Records</title>
    <style>
        :root {
            --primary-blue: #1a73e8;
            --dark-blue: #0d47a1;
            --light-blue: #e8f0fe;
            --light-gray: #f5f5f5;
            --white: #ffffff;
            --text-dark: #333333;
            --text-light: #666666;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-gray);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--text-dark);
        }
        
        .form-container {
            width: 80%;
            max-width: 1000px;
            display: flex;
            justify-content: center;
        }
        
        .form-popup {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
        }
        
        .form-popup h3 {
            color: var(--primary-blue);
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 28px;
            text-align: center;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            flex: 1;
            margin-bottom: 0;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 16px;
        }
        
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary-blue);
            outline: none;
            box-shadow: 0 0 0 3px var(--light-blue);
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 20px;
            margin-top: 40px;
        }
        
        .form-actions input[type="submit"],
        .form-actions .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .form-actions input[type="submit"] {
            background-color: var(--primary-blue);
            color: white;
        }
        
        .form-actions input[type="submit"]:hover {
            background-color: var(--dark-blue);
            transform: translateY(-2px);
        }
        
        .form-actions .btn {
            background-color: #f0f0f0;
            color: var(--text-dark);
            text-decoration: none;
        }
        
        .form-actions .btn:hover {
            background-color: #e0e0e0;
            transform: translateY(-2px);
        }
        
        input[type="hidden"] {
            display: none;
        }
    </style>
</head>
<body>
<div class="form-popup" id="editAppointmentForm">
    <h3>Edit Appointment</h3>
    <form action="update_record_action.php" method="post">
        <div class="form-group">
         <p>idD : <?php echo $records['idD'] ?></p>
        <p>idA : <?php echo $records['idA'] ?></p>
        </div>
        <div class="form-group">
        <label for="diagnosis">diagnosis</label>
        <textarea id="dignosis" name="diagnosis" cols="195" rows="4" value="<?php echo ($records['diagnosis']); ?>"><?php echo ($records['diagnosis']); ?></textarea>
      </div>
      
      <div class="form-group">
        <label for="treatment">treatment</label>
        <textarea id="treatment" name="treatment" cols="195" rows="4" value="<?php echo ($records['treatment']); ?>"><?php echo ($records['treatment']); ?></textarea>
      </div> 
      <div class="form-group">
        <label for="prescriptions">prescriptions</label>
        <textarea id="prescriptions" name="prescriptions" cols="195" rows="4" value="<?php echo ($records['prescriptions']); ?>"><?php echo ($records['prescriptions']); ?></textarea>
      </div>
      <div class="form-actions">
      <input type="hidden" name="id" value="<?php echo($id); ?>">
      <button type="button" class="btn" onclick="window.location.href='records.php'">Cancel</button>
      <input type="submit" value="Save Changes" name="save"> 
      </div>
    </form>
  </div>

</body>
</html>
