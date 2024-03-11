<?php 
include("db.php");
?>
<?php
if(!isset($_SESSION["email"])){
    
    ?>
    <?php header("location: LOGIN.php"); ?>
    <?php
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

    <style>
        body {
	font-family: 'Lato', sans-serif;
	background: #353535;
	color: #FFF;
    .content{
    width: 1200px;
    left: 400px;
    height: auto;
    margin: auto;
    color: #fff;
    position: relative;
}
.jumbotron h1 {
  text-align: center;
	color: #f0f0f0;
	height: 100%;
	width: 100%;
}
}
header h3{font-weight: 500;} 
        header{position: relative;
}
footer {
  text-align: center;
  margin-left: 20px;
  margin-bottom: 0x; 
  margin-top: 80px;
}
footer p {
  margin-left: 30px;
  margin: 0;
  padding: 0;
}
span.icon {
	margin: 0 5px;
	color: #D64541;
}
h1 {
	color: #ffffff;
  text-transform: uppercase;
  letter-spacing: 4px;
}
h2 {
	color: #BDC3C7;
  text-transform: uppercase;
  letter-spacing: 3px;
}
h3 {
	color: #5f707c;
  text-transform: uppercase;
  letter-spacing: 1px;
}
p {
	color: #5f707c;
}
.mrng-60-top {
	margin-top: 60px;
}
/* Global Button Styles */
a.animated-button:link, a.animated-button:visited {
	position: relative;
	display: block;
	margin: 30px 300px;
	padding: 14px 5px;
	color: #fff;
	font-size:14px;
	font-weight: bold;
	text-align: center;
	text-decoration: none;
	text-transform: uppercase;
	overflow: hidden;
	letter-spacing: .08em;
	border-radius: 0;
	text-shadow: 0 0 1px rgba(0, 0, 0, 0.2), 0 1px 0 rgba(0, 0, 0, 0.2);
	-webkit-transition: all 1s ease;
	-moz-transition: all 1s ease;
	-o-transition: all 1s ease;
	transition: all 1s ease;
}
a.animated-button:link:after, a.animated-button:visited:after {
	content: "";
	position: absolute;
	height: 0%;
	left: 50%;
	top: 50%;
	width: 600%;
	z-index: -1;
	-webkit-transition: all 0.75s ease 0s;
	-moz-transition: all 0.75s ease 0s;
	-o-transition: all 0.75s ease 0s;
	transition: all 0.75s ease 0s;
}
a.animated-button:link:hover, a.animated-button:visited:hover {
	color: #FFF;
	text-shadow: none;
}
a.animated-button:link:hover:after, a.animated-button:visited:hover:after {
	height: 450%;
}

a.animated-button.gibson-one {
	border: 3px solid #65b37a;
	color: #FFF;
}
a.animated-button.gibson-one:after {
	opacity: 0;
	background-image: -webkit-linear-gradient( transparent 50%, rgba(72, 247, 19, 0.555) 50%);
	background-image: -moz-linear-gradient(transparent 50%, rgba(128, 194, 7, 0.2) 50%);
	background-size: 10px 8px;
	-moz-transform: translateX(-50%) translateY(-50%) rotate(25deg);
	-ms-transform: translateX(-50%) translateY(-50%) rotate(25deg);
	-webkit-transform: translateX(-50%) translateY(-50%) rotate(25deg);
	transform: translateX(-50%) translateY(-50%) rotate(25deg);
}
a.animated-button.gibson-one:hover:after {
	height: 800% !important;
	opacity: 1;
	color: #FFF;
}

a.animated-button.gibson-final {
	border: 3px solid #e71c1c;
	color: #FFF;
}
a.animated-button.gibson-final:after {
	opacity: 0;
	background-image: -webkit-linear-gradient( transparent 50%, rgba(196, 59, 59, 0.911) 50%);
	background-image: -moz-linear-gradient(transparent 50%, rgba(202, 52, 26, 0.2) 50%);
	background-size: 5px 5px;
	-moz-transform: translateX(-50%) translateY(-50%);
	-ms-transform: translateX(-50%) translateY(-50%);
	-webkit-transform: translateX(-50%) translateY(-50%);
	transform: translateX(-50%) translateY(-50%);
}
a.animated-button.gibson-final:hover:after {
	height: 600% !important;
	opacity: 1;
	color: #FFF;
}
.logo{
    text-align: center;
    display: fixed;
    gap: .5rem;
    letter-spacing: .2em;
    margin-right: auto;
}
.logo img{
    display: block; 
    margin: 0 auto;
    width: 6rem;
    height: 6rem;
}
footer {
  background-color: #33333;
  padding: 20px;
  text-align: center;
}

.feedback, .queries {
  display: inline-block;
  width: 45%; /* Adjust width as needed */
  vertical-align: top;
}

.feedback form {
  background-color: #e6e6fa;
  padding: 20px;
  border-radius: 10px;
  border: 1px solid #ddd; /* Add border */
  font-family: Arial, sans-serif; /* Font styling */
  font-size: 16px;
  color: #333;
  text-align: left; /* Text alignment */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease; /* Transition effect */
}

.feedback form:hover {
  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); /* Hover effect */
}


.feedback textarea {
  width: 100%;
  height: 100px;
  margin-bottom: 10px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
  resize: none;
  font-family: Arial, sans-serif; /* Font styling */
  font-size: 14px;
  color: #333;
  ::placeholder { /* Placeholder styling */
    color: #999;
  }
  transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Transition effect */
}

.feedback textarea:focus {
  border-color: #007bff; /* Focus effect */
  box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1); /* Focus effect */
}
.feedback button {
  background-color: #4caf50; /* Green color */
  color: white;
  border: none;
  padding: 12px 24px;
  cursor: pointer;
  border-radius: 25px;
  font-size: 16px;
  transition: background-color 0.3s ease, transform 0.2s ease;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.feedback button:hover {
  background-color: #388e3c; /* Darker green color */
  transform: translateY(-2px);
}

.feedback button:focus, .feedback button:active {
  outline: none;
  box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.5); /* Adjust color and size as needed */
}

.queries p {
  font-size: 14px;
  font-family: Arial, sans-serif; /* Font styling */
  margin-bottom: 10px; /* Margin */
}

.queries a {
  color: #007bff;
  text-decoration: none;
  transition: color 0.3s ease; /* Transition effect */
}

.queries a:hover {
  text-decoration: underline;
  color: #0056b3; /* Change color on hover */
}
    </style>

</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/logo.png" alt="">
            <h1><span class="danger">GITHUB</span></h1>
        </div>
        <div class="navbar">
            <a href="index.php">
                <span class="material-icons-sharp">home</span>
                <h3>Home</h3>
            </a>
            
            <a href="timetable.php" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Time Table</h3>
            </a> 
            <a href="exam.php">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Examination</h3>
            </a>
            <a href="password.php" class="active">
              <span class="material-icons-sharp">password</span>
              <h3>Aptitude</h3>
          </a>
            <a href="logout.php">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
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

        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">PROGRAMMING IN C</h2>
        </center>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/c/c_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/c/c_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/c/c_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/c/c_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        </div>

        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">PYTHON PROGRAMMING</h2>
        </center>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/python/py_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/python/py_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/python/py_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/python/py_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        </div>
        
        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">DATA ANALYSIS USING EXCEL</h2>
        </center>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/excel/ex_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/excel/ex_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/excel/ex_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/excel/ex_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        </div>

        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">JAVA PROGRAMMING</h2>
        </center>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/java/java_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/java/java_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/java/java_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/java/java_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        
        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">OPERATING SYSTEM</h2>
        </center>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/os/os_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/os/os_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/os/os_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/os/os_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        </div>

        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">CLOUD COMPUTING</h2>
        </center>
          </div>
        </div>
        
       <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/cloud/cc_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/cloud/cc_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/cloud/cc_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/cloud/cc_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        </div>
        
        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">SOFTWARE ENGINEERING</h2>
        </center>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/software_eng/se_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/software_eng/se_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/software_eng/se_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/software_eng/se_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        </div>

        <center>
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="mrng-60-top">R PROGRAMMING</h2>
        </center>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/r_prog/r_basic.html" class="btn btn-sm animated-button gibson-one">BEGINNER</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/r_prog/r_inter.html" class="btn btn-sm animated-button gibson-one">INTERMEDIATE</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/r_prog/r_adv.html" class="btn btn-sm animated-button gibson-one">ADVANCED</a> </div>
          <div class="col-md-3 col-sm-3 col-xs-6"> <a href="/online quiz/sms/subject_quiz/r_prog/r_final.html" class="btn btn-sm animated-button gibson-final">FINAL ASSESSMENT</a> </div>
        </div> 
      </div>
        <footer class="jumbotron text-center">
        <b><h2 class="mrng-60-top">STUDENT MANAGEMENT SYSTEM WITH APTITUDE TEST BY</h2></b>
        <br><br><br>
        <div class="logo">
  
  <img src="./images/logo.png" alt="">
  <br>
  <h1>G<span class="danger">IT</span>HUB ASSOCIATION</h1>
  <br>
  <h1>DEPARTMENT OF INFORMATION TECHNOLOGY</h1>
</div>
        <div class="container">
          <p style="color:#ffffff"><h1>MENTORED BY - MR.RAVI SHANKAR & MRS.KANIMOZHI</h1></p>
          <p style="color:#ffffff"><h1>DESIGNED AND DEVELOPED BY - RAGUL & CHOLA</h1></p>
          <br><a></a>       
          </div>
          <br><br>
          <div class="feedback">
    <h2>Feedback</h2>
    <br>
    <form action="mailto:ragulv1501@gmail.com" method="post" enctype="text/plain">
      <textarea name="message" placeholder="Enter your feedback here"></textarea>
      <center><button type="submit">Submit</button></center>
    </form>
  </div>
  <div class="queries">
    <h2>Queries</h2>
    <br><br>
    <h2>If you have any queries,</h2><br><h2> feel free to contact us at </h2>
    <br>
    <p><a href="mailto:ragulv1501@gmail.com">ragulv1501@gmail.com</a><h3>8838348941</h3></p>
    <p><a href="mailto:ragulv1501@gmail.com">chola@gmail.com</a><h3>6383899379</h3></p>
  </div>
  <br><br>  
  <br><br>
  <h3>© 2024 - DEPARTMENT OF INFORMATION TECHNOLOGY All rights reserved. | Website created by DEPARTMENT OF INFORMATION TECHNOLOGY</h3>
</footer>
        </footer>
</body>

</body>

<script src="app.js"></script>

</html>