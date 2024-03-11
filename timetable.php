<?php 
include("db.php");

?>
<?php
if(!isset($_SESSION["email"])){
    
    ?>
    <?php header("location: LOGIN.php"); ?>
    <?php
}
$email = $_SESSION['email'];
$email = $con->real_escape_string($email);
$sql = "select * from login1 where email = ('$email') ";
$result = $con -> query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $year = $row["year"];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/logo.png" alt="">
            <h1>G<span class="danger">IT</span>HUB</h1>
        </div>
        <div class="navbar">
            <a href="index.php">
                <span class="material-icons-sharp">home</span>
                <h3>HOME</h3>
            </a>
            <a href="timetable.php" class="active" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>TIME TABLE</h3>
            </a> 
            <a href="exam.php">
                <span class="material-icons-sharp">grid_view</span>
                <h3>EXAMINATION</h3>
            </a>
            <a href="password.php">
                <span class="material-icons-sharp">password</span>
                <h3>APTITUDE</h3>
            </a>
            <a href="logout.php">
                <span class="material-icons-sharp">logout</span>
                <h3>LOG OUT</h3>
            </a>
        </div>
        <div id="profile-btn" style="display: none;">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
        
    </header>
    <?php
    if($year=="Third year"){
    include "time_third.html";
    }
    if($year=="Second year"){
    include "time_second.html";
    }
    ?>

</body>
</html>