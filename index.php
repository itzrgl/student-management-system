<?php 
include "../db.php";
if(!isset($_SESSION["admin"])){
    header("../sms/LOGIN.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEPARTMENT OF IT</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start; 
            padding-top: 50px; 
            margin-left: 80px;
        }
        .welcome-message {
            text-align: center;
            margin-top: 80px;
            background-color: #f0f0f0;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .welcome-message h2 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo" title="GNC Management System">
            <img src="./images/logo.png" alt="">
            <h1>G<span class="danger">IT</span>HUB</h1>
        </div>
        
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        
    </header>
    <div class="container">
        <div class="welcome-message">
            <h2>Welcome to Admin Login</h2>
        </div>
        <aside>
            <div class="navbar">
                <a href="index.php" class="active">
                    <span class="material-icons-sharp">home</span>
                    <h3>Home</h3>
                </a>
                <a href="user_info.php">
                    <span class="material-icons-sharp">account_circle</span>
                    <h3>User Info</h3>
                </a> 
                <a href="quiz_score.php">
                    <span class="material-icons-sharp">emoji_events</span>
                    <h3>Quiz Score</h3>
                </a>
                
                </a>
                <a href="../logout.php">
                    <span class="material-icons-sharp" onclick="">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
    </div>
</body>
</html>
