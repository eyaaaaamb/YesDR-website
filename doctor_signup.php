<?php

if (isset($_POST['save'])) {
    $fname = $_POST['fname'];     
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $rpps = $_POST['rpps'];
    $specialite = $_POST['specialty'];
    $password = md5($_POST['mdp']);
    $confirm_password = $_POST['confirm_password'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $imgName = $_FILES['img']['name'];
        $imgTmp = $_FILES['img']['tmp_name'];
        $targetPath = "../img/" . $imgName;
        move_uploaded_file($imgTmp, $targetPath);
    }

  

include "cnx.php";
$stmt = $cnx->prepare("INSERT INTO medecins(idM, nomM, prenomM, emailM, rpps, specialite, passwordM, img) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $fname);
$stmt->bindParam(2, $lname);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $rpps);
$stmt->bindParam(5, $specialite);
$stmt->bindParam(6, $password);
$stmt->bindParam(7, $imgName);
$stmt->execute();


    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Portal - Doctor Sign Up</title>
    <style>
        :root {
            --primary-color: #1a73e8;
            --primary-light: #4285f4;
            --primary-dark: #0d47a1;
            --secondary-color: #f1f3f4;
            --text-color: #202124;
            --light-text: #5f6368;
            --white: #ffffff;
            --border-color: #dadce0;
            --error-color: #d32f2f;
            --success-color: #388e3c;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .auth-container {
            width: 100%;
            max-width: 500px;
            background: var(--white);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }
        
        h2 {
            margin-bottom: 20px;
            color: var(--primary-dark);
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }
        
        input:focus, select:focus {
            border-color: var(--primary-color);
            outline: none;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: var(--primary-dark);
        }
        
        .error-message {
            color: var(--error-color);
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            background-color: rgba(211, 47, 47, 0.1);
        }
        
        .success-message {
            color: var(--success-color);
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
            background-color: rgba(56, 142, 60, 0.1);
        }
        
        .patient-link {
            text-align: center;
            margin-top: 20px;
            color: var(--light-text);
        }
        
        .patient-link a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .patient-link a:hover {
            text-decoration: underline;
        }
        
        .login-link {
            text-align: center;
            margin-top: 10px;
            color: var(--light-text);
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h2>Doctor Sign Up</h2>
        
        <form id="doctorSignupForm" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img">Profile Image</label>
                <input type="file" id="img" name="img" accept="image/*">
            </div>
            <div class="form-group">
                <label for="doctorFirstName">First Name:</label>
                <input type="text" id="doctorFirstName" name="fname" required>
            </div>
            <div class="form-group">
                <label for="doctorLastName">Last Name:</label>
                <input type="text" id="doctorLastName" name="lname" required>
            </div>
            <div class="form-group">
                <label for="doctorEmail">Email:</label>
                <input type="email" id="doctorEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="doctorSpecialty">Specialty:</label>
                <input type="text" id="doctorSpecialty" name="specialty" required>
            </div>
            <div class="form-group">
                <label for="doctorRPPS">RPPS Number:</label>
                <input type="text" id="doctorRPPS" name="rpps" required>
            </div>
            <div class="form-group">
                <label for="doctorPassword">Password:</label>
                <input type="password" id="doctorPassword" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="doctorConfirmPassword">Confirm Password:</label>
                <input type="password" id="doctorConfirmPassword" name="confirm_password" required>
            </div>
            
            <button type="submit" name="save" class="btn">Sign Up</button>
        </form>
        
        <div class="patient-link">
            Are you a patient? <a href="patient_signup.php">Sign up as a patient</a>
        </div>
        <div class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password confirmation validation
            const signupForm = document.getElementById('doctorSignupForm');
            if (signupForm) {
                signupForm.addEventListener('submit', function(e) {
                    const password = document.getElementById('doctorPassword').value;
                    const confirmPassword = document.getElementById('doctorConfirmPassword').value;
                    
                    if (password !== confirmPassword) {
                        alert('Passwords do not match');
                        e.preventDefault();
                    }
                });
            }
        });
    </script>
</body>
</html>