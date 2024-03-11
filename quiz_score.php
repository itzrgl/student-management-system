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
                <h2>SCORE</h2>
                <form  method= "post">
                    <div class="select-wrapper">
                        <label for="year-select">Select Year:</label>
                        <select id="year-select" name="year">
                            <option>--</option>
                            <option value="First year">First Year</option>
                            <option value="Second year">Second Year</option>
                            <option value="Third year">Third Year</option>
                            
                        </select>
                        <label for="year-select">Subject</label>
                        <select id="year-select" name="subject">
                            <option>--</option>
                            <option value="c programming">C Programming</option>
                            <option value="python">Python</option>
                            <option value="java">JAVA</option>
                            <option value="software">Software Engineering</option>
                            <option value="excel">Advanced Excel</option>
                            <option value="os">Operating System</option>
                            <option value="cloud">Cloud computing</option>
                            <option value="r programming">R Programming</option>
                        </select>
                    </div>
                    <button type="submit">Show Details</button>
                </form>
            </div>
        </div>

    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected values from the form
    $year = $_POST["year"];
    $subject = $_POST["subject"];
    $subjectColumns = '';
    switch ($subject) {
        case 'c programming':
            $subjectColumns = 'c_basic, c_inter, c_adv, c_final';
            break;
        case 'python':
            $subjectColumns = 'py_basic, py_inter, py_adv, py_final';
            break;
        case 'java':
            $subjectColumns = 'java_basic, java_inter, java_adv, java_final';
            break;
        case 'software':
            $subjectColumns = 'se_basic, se_inter, se_adv, se_final';
            break;
        case 'excel':
            $subjectColumns = 'ex_basic, ex_inter, ex_adv, ex_final';
            break;
        case 'os':
            $subjectColumns = 'os_basic, os_inter, os_adv, os_final';
            break;
        case 'cloud':
            $subjectColumns = 'cc_basic, cc_inter, cc_adv, cc_final';
            break;
        case 'r programming':
            $subjectColumns = 'r_basic, r_inter, r_adv, r_final';
            break;
    }
    $query = "SELECT login1.name, login1.email, login1.roll_no, login1.register_no, login1.dob, login1.password, scores.*
                                FROM login1 LEFT JOIN scores ON login1.email = scores.email WHERE login1.year1 = '$year'";
    $result = $con->query($query);
    echo "<div class='container'>";

        echo "<div class='quiz-score'>";
            echo "<h2>Quiz Score</h2>";
            echo "<table>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th>Roll No</th>";
                        echo "<th>Name</th>";
                        echo "<th>Year</th>";
                        $subjectHeaders = explode(', ', $subjectColumns);
                        foreach ($subjectHeaders as $header) {
                        echo "<th>$header</th>";
                        }
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                    
                    
                    while ($row = $result->fetch_assoc()) {
                        $showresult = false;
                        $subjectScores = explode(', ', $subjectColumns);
                        foreach ($subjectScores as $score){
                            if (!is_null($row[$score])) {
                                $showresult = true;
                        }
                    }
                        if($showresult){
                        echo "<tr>";
                        echo "<td>{$row['roll_no']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>$year</td>";
                        
                        foreach ($subjectScores as $score) {
                        echo "<td>{$row[$score]}</td>";
                        }
                        echo "</tr>";
                    }
                    }
                }
                echo "</tbody>";
                    $con->close();
                
                    ?>
                    
                    <!-- Add more rows as needed -->
                
            </table>
        </div>
    </div>
</body>
</html>
