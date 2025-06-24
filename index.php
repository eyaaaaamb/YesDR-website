<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>yesDr - Welcome</title>
    <link rel="shortcut icon" href="img/logo_blue.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #1a73e8; 
            text-align: center;
        }
        
        .logo-container {
            margin-bottom: 30px;
        }
        
        .logo {
            max-width: 150px; 
            height: auto;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 80%;
        }
        
        .login-btn {
            background-color:#1a73e8;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        
        .login-btn:hover {
            background-color:#1a73e8;
        }
    </style>
</head>
<body>
    <div class="logo-container">
        
        <img src="./img/logo_blue.png" alt="yesDr Logo" class="logo" style="max-width:300px">
    </div>
    
    <h1>Welcome to yesDr</h1>
    <p>Your personal healthcare companion</p>
    <a href="login.php" class="login-btn">Login</a>
</body>
</html>