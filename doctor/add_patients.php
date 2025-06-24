<?php
include "../cnx.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add patient</title> 
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
        <h3>Add New Patient</h3>
        <form action="add_patients_action.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="Homme">Male</option>
                        <option value="Femme">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birthDate">Birth Date</label>
                    <input type="date" id="birthDate" name="birthDate" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="password">Temporary Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="button" class="btn" onclick="window.location.href='patients.php'">Cancel</button>
                <input type="submit" value="Save Patient" name="save"> 
            </div>
        </form>
    </div>
</div>
</body>
</html>