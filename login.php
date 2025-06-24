<?php session_start()   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="shortcut icon" href="img/logo_blue.png" type="image/x-icon">
    <title>Medical Portal - Login</title>
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
        }
        
        .signup-link {
            text-align: center;
            margin-top: 20px;
            color: var(--light-text);
        }
        
        .signup-link a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <h2>Login to Your Account</h2>
        
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error-message"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
        <?php endif; ?>
        
        <form id="loginForm" action="login-action.php" method="POST">
            <div class="form-group">
                <label for="loginRole">I am a:</label>
                <select id="loginRole" name="role" required>
                    <option value="">Select Role</option>
                    <option value="doctor">Doctor</option>
                    <option value="patient">Patient</option>
                </select>
            </div>
            <div class="form-group">
                <label for="loginEmail">Email:</label>
                <input type="email" id="loginEmail" name="email" required>
            </div>
            <div class="form-group">
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="mdp" required>
            </div>
            <button type="submit"  class="btn">Log In</button>
        </form>
        
        <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign up</a>
        </div>
    </div>
</body>
</html>