<?php 
include "../db.php";
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
        .user-info {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 3 3 10px rgba(0, 0, 0, 0.1);
    width: 250%; /* Adjust the width as needed */
    margin: 0 auto; /* Center the box horizontally */
}

.select-wrapper {
    margin-bottom: 25px;
}

label {
    font-weight: bold;
    margin-bottom: 10px;
}

select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #45a049;
}

h2 {
    margin-bottom: 20px;
}
        .quiz-score {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 30px;
    overflow-x: auto; /* Enable horizontal scrolling on small screens */
    width: 300%;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

td {
    font-size: 14px;
}

tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f2f2f2;
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
                
                <a href="../logout.php">
                    <span class="material-icons-sharp" onclick="">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

        <div class="container">
            <div class="user-info">
                <br><br>
                <h2>STUDENT INFORMATION</h2>
                <form method = "post">
                    <div class="select-wrapper">
                        <label for="year-select">Select Year:</label>
                        <select id="year-select" name="year">
                            <option>--</option>
                            <option value="First year">First year</option>
                            <option value="Second year">Second year</option>
                            <option value="Third year">Third year</option>
                        </select>
                    </div>
                    <button type="submit">Show Details</button>
                </form>
            </div>
        </div>
    </div>
    
    
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
      
    echo "<div class='container'>";
        echo "<div class='quiz-score'>";
            echo "<h2>Quiz Score</h2>";
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Reg No</th>";
                        echo "<th>Name</th>";
                        echo "<th>Year</th>";
                        echo "<th>DOB</th>";
                        echo "<th>EMAIL</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    echo "<tr>";
                    
                    $year = $_POST['year'];
                    $studentInfoResult = $con->query("select * from login1 where year1=('$year')");
                
                while ($student = $studentInfoResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $student['register_no'] . "</td>";
                echo "<td>" . $student['name'] . "</td>";
                echo "<td>" . $student['year1'] . "</td>";
                echo "<td>" . $student['dob'] . "</td>";
                echo "<td>" . $student['email'] . "</td>";
                // Add more cells based on your database columns
                echo "</tr>";
                }
            }
            ?>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
