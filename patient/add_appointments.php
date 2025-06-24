<?php
session_start();
$idP=$_SESSION['id'];
if (!isset($_SESSION['id'])) {
    header("Location: ../index.php");
    exit();
}
include "../cnx.php";

$res = $cnx->query("SELECT idM, CONCAT(nomM, ' ', prenomM) as full_name FROM medecins");
$dr=$res->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Appointment</title>
    <style>
        :root {
            --primary-blue: #1a73e8;
            --dark-blue: #0d47a1;
            --light-blue: #e8f0fe;
            --light-gray: #f5f5f5;
            --white: #ffffff;
            --text-dark: #333333;
            --text-light: #666666;
            --border-color: #dadce0;
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
            max-width: 700px;
        }
        
        .form {
            background-color: var(--white);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }
        
        .form h3 {
            color: var(--primary-blue);
            margin-top: 0;
            margin-bottom: 30px;
            font-size: 24px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--text-dark);
            font-weight: 500;
            font-size: 16px;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary-blue);
            outline: none;
            box-shadow: 0 0 0 3px var(--light-blue);
        }
        
        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }
        
        .form-group select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }
        
        .form-actions input[type="submit"],
        .form-actions .btn {
            padding: 12px 24px;
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
        
        @media (max-width: 768px) {
            .form-container {
                width: 95%;
                padding: 20px;
            }
            
            .form {
                padding: 25px;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .form-actions input[type="submit"],
            .form-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="form-container">
    <div class="form">
        <h3>Add New Appointment</h3>
        <form action="add_appointements_action.php" method="post">
            <div class="form-group">
            <label for="idM">Doctor</label>
<select id="idM" name="idM" required>
    <option value="">Select a doctor</option>
    <?php foreach ($dr as $item):
        $idM = $item['idM'];  ?>
        <option value="<?php echo $idM ?>">
            <?php echo $item['idM'] . " : " . $item['full_name']; ?>
        </option>
    <?php endforeach; ?>
</select>

            </div>
            
            <div class="form-group">
                <label for="appointmentDate">Date & Time</label>
                <input type="datetime-local" id="appointmentDate" name="appointmentDate" required>
            </div>
            
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="3"></textarea>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn" onclick="window.location.href='appointments.php'">Cancel</button>
                <input type="submit" value="Save Appointment" name="save"> 
            </div>
        </form>
    </div>
</div>
</body>
</html>