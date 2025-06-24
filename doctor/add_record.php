<?php
session_start();
$idM = $_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
include "../cnx.php";
$sql_a="SELECT * FROM appointments where idM=$idM";
$res_a=$cnx->query($sql_a);
$app=$res_a->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title> 
    <link rel="stylesheet" href="../css/style.css">
    <style>
        
        
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
        
        .form {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
        }
        
        .form h3 {
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
    </style>
</head>
<body>
<div class="form-container">
    <div class="form">
        <h3>Add New Record</h3>
        <form action="add_record_action.php" method="post">
        <div class="form-row">
        <label for="idA">Appointments</label>
                <select id="idA" name="idA" required>
                    <option value="">Select an appointment</option>
                    <?php foreach ($app as $item): ?>
                        <option value="<?php echo ($item['idA']); ?>">
                            <?php echo ($item['idA']) ; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
        </div> 
        <div class="form-row">
                <div class="form-group">
                    <label for="diagnosis">diagnosis</label>
                    <input type="text" id="diagnosis"  name="diagnosis" required>
                </div>
                
            </div>
            
            <div class="form-row">
            <div class="form-group">
                    <label for="treatment">treatment</label>
                    <input type="text" id="treatment" name="treatment" required>
                </div>
              

            </div>
            
            <div class="form-group">
                <label for="prescriptions">prescriptions</label>
                <input type="text" id="prescriptions" name="prescriptions" required>
            </div>
            
           
            
            <div class="form-actions">
                <button type="button" class="btn" onclick="window.location.href='records.php'">Cancel</button>
                <input type="submit" value="Save" name="save"> 
            </div>
        </form>
    </div>
</div>
</body>
</html>