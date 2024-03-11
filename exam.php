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
<?php
if($year=="Third year"){
    include "exam_third.html";
}
if($year=="Second year"){
    include "exam_sec.html";
}
?>
