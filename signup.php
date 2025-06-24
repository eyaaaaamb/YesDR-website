<?php
if ( isset($_POST['save'])) {
    $fname = $_POST['fname'];     
    $lname = $_POST['lname'];
    $gender = ($_POST['gender'] === "male") ? "Homme" : "Femme";
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthDate = $_POST['birthdate'];
    $password = md5($_POST['mdp']);
    $confirm_password = $_POST['confirm_password'];

if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    $imgName = $_FILES['img']['name'];
    $imgTmp = $_FILES['img']['tmp_name'];
    $targetPath = "img/" . $imgName;
    move_uploaded_file($imgTmp, $targetPath);
}
 include "cnx.php";
// Prepare the SQL statement with placeholders to securely insert data and prevent SQL injection attacks
$stmt = $cnx->prepare("INSERT INTO patients(idP, nomP, prenomP, sexeP, emailP, phone, dateP, passwordP, img) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $fname);
$stmt->bindParam(2, $lname);
$stmt->bindParam(3, $gender);
$stmt->bindParam(4, $email);
$stmt->bindParam(5, $phone);
$stmt->bindParam(6, $birthDate);
$stmt->bindParam(7, $password);
$stmt->bindParam(8, $imgName);
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
     <link rel="shortcut icon" href="img/logo_blue.png" type="image/x-icon">
    <title>Medical Portal - Patient Sign Up</title>
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
        
        .doctor-link {
            text-align: center;
            margin-top: 20px;
            color: var(--light-text);
        }
        
        .doctor-link a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .doctor-link a:hover {
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
        <h2>Patient Sign Up</h2>
        <form id="patientSignupForm" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img">Profile Image</label>
                <input type="file" id="img" name="img" accept="image/*">
            </div>
            <div class="form-group">
                <label for="patientFirstName">First Name:</label>
                <input type="text" id="patientFirstName" name="fname" required>
            </div>
            <div class="form-group">
                <label for="patientLastName">Last Name:</label>
                <input type="text" id="patientLastName" name="lname" required>
            </div>
            <div class="form-group">
                <label for="patientEmail">Email:</label>
                <input type="email" id="patientEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="patientGender">Gender:</label>
                <select id="patientGender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="patientPhone">Phone:</label>
                <input type="tel" id="patientPhone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="patientBirthdate">Birthdate:</label>
                <input type="date" id="patientBirthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="patientPassword">Password:</label>
                <input type="password" id="patientPassword" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="patientConfirmPassword">Confirm Password:</label>
                <input type="password" id="patientConfirmPassword" name="confirm_password" required>
            </div>
            
            <button type="submit" name="save" class="btn">Sign Up</button>
        </form>
        
        <div class="doctor-link">
            Are you a doctor? <a href="doctor_signup.php">Sign up as a doctor</a>
        </div>
        <div class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password confirmation validation
            const signupForm = document.getElementById('patientSignupForm');
            if (signupForm) {
                signupForm.addEventListener('submit', function(e) {
                    const password = document.getElementById('patientPassword').value;
                    const confirmPassword = document.getElementById('patientConfirmPassword').value;
                    
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