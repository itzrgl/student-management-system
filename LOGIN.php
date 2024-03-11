<?php 
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="LOGIN.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <nav class="navlist">
                <ul>
              <li><h1>STUDENT MANAGEMENT SYSTEM WITH APTITUDE TEST</h1></li>
                </ul>
             </nav>
        </div> 
        <div class="content">
            <br>
            <h1>Guru Nanak College - Autonomous</h1>
            <p class="par">Affiliated to University of Madras,
                Accredited at 'A++' Grade by NAAC</p>
                <ul>
                <li><h3>DEPARTMENT OF INFORMATION TECHNOLOGY</h3></li>
                </ul>

                
                </div>
                <div class="form">
                    <h2>Login Here</h2>
                    <form method ="post">
                    <input type="email" name="email" placeholder="Enter Email id ">
                    <input type="password" name="password" placeholder="Enter Password ">
                    <br><br>
                    <button class="btnn" name="submit1"><a>Login</a></button>
                    <br><br>
                        
                    </form>  
                    <p class="liw">CONTACT US ON</p>
                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
                    </div>

                </div>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <?php
     if($_SERVER['REQUEST_METHOD']=='POST')
     {
         $email = $_POST['email'];
         $password = $_POST['password'];
         
         $count = 0;
         $res = mysqli_query($con,"select * from login1 where email = ('$email') && password = ('$password')");
         $count = mysqli_num_rows($res);
         if($email=="admin@gmail.com" && $password=="admin"){
            $_SESSION['admin']="admin@gmail.com";
            header("location: ../sms/admin/index.php");
         }
 
         if($count==0){
             echo "<script type = 'text/javascript'> alert('Invalid email or password')</script>";
 
         }
 
         else{

            $_SESSION["email"] = $_POST["email"];
            ?>
            <?php header("location: index.php"); ?>
            <?php

         }
     }
     ?>
</body>
</html>