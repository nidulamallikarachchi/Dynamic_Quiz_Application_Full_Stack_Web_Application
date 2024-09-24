<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="styles/4.2.Mark_Quiz.css">
    <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
    <link rel="icon" href="images/quiz-icon.png">
</head>

<?php
global $conn;
include("header.inc");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["q6"]) && is_array($_POST["q6"])) {
        $selectedCount_q6 = count($_POST["q6"]);
    }

    if (isset($_POST["q7"]) && is_array($_POST["q7"])) {
        $selectedCount_q7 = count($_POST["q7"]);
    }

    $validation_error = NULL;
    if ($selectedCount_q7 > 1 || $selectedCount_q6 > 1) {
        $validation_error = "Please select only one checkbox";
    }
    // Define an array to store the correct answers for each question
    $correctAnswers = array(
        'q1' =>   'q1a1', 
        'q2' =>   'q2a1', 
        'q3' =>   'q3a4', 
        'q4' =>   'q4a2', 
        'q5' =>   'q5a2', 
        'q8' =>   'q8a2', 
    );
    // Initialize a counter for the score
    $score = 0;

    // Loop through each question and check the answer
    foreach ($correctAnswers as $question => $correctAnswer) {
        if (isset($_POST[$question])) {
            $selectedAnswer = $_POST[$question];
            // Check if the selected answer for the question is correct
            if ($selectedAnswer === $correctAnswer) {
                $score++; // Increment the score if the answer is correct
            }
        }   
    }


    $correctAnswers_checkbox = array(
        'q6' => array('q6a1'), // Correct answers for question 6
        'q7' => array('q7a3'), // Correct answers for question 7
    );

    if (isset($_POST['q6']) && is_array($_POST['q6'])) {
        foreach ($_POST['q6'] as $selectedAnswer) {
            if (in_array($selectedAnswer, $correctAnswers_checkbox['q6'])) {
                $score++; // Increment the score for question 6 if the answer is correct
            }
        }
    }

    if (isset($_POST['q7']) && is_array($_POST['q7'])) {
        foreach ($_POST['q7'] as $selectedAnswer) {
            if (in_array($selectedAnswer, $correctAnswers_checkbox['q7'])) {
                $score++; // Increment the score for question 6 if the answer is correct
            }
        }
    }

    $text_ans = trim($_POST['q9']);
    $text_ans = htmlspecialchars($text_ans, ENT_QUOTES, 'UTF-8');
    $text_ans = strtolower($text_ans);
    if ($text_ans == "yes") {
            $score++; // Increment the score if the answer is correct
        }
    
    $num_ans = trim($_POST['q10']);
    $num_ans = htmlspecialchars($num_ans, ENT_QUOTES, 'UTF-8');
    if ($num_ans == "2") {
            $score++; // Increment the score if the answer is correct
        }
    
    // Now, $score contains the total score based on correct answers.
    
}

// try{
//     $tableExists = mysqli_query($conn, "SELECT 1 FROM attempts");
// }
// catch(mysqli_sql_exception $e){
//     $createTableQuery = "
//     CREATE TABLE attempts (
//         Attempt_id INT AUTO_INCREMENT PRIMARY KEY,
//         Date_time DATETIME,
//         First_name VARCHAR(30),
//         Last_name VARCHAR(30),
//         Student_number INT,
//         Attempt INT,
//         Score INT
//     )";
//     if (mysqli_query($conn, $createTableQuery)) {
//         echo "<h4> Table 'attempts' created successfully.</h4>";
//     } else {
//         echo "<h4>Error creating table: </h4>" . mysqli_error($conn);
//     }
// }

$tableExists = mysqli_query($conn, "SELECT 1 FROM attempts");
if (!$tableExists) {
    if (mysqli_errno($conn) == 1146) {
        // Table does not exist, create it
        $createTableQuery = "CREATE TABLE attempts (
            Attempt_id INT AUTO_INCREMENT PRIMARY KEY,
            Date_time DATETIME,
            First_name VARCHAR(30),
            Last_name VARCHAR(30),
            Student_number INT,
            Attempt INT,
            Score INT
        )";
        if (mysqli_query($conn, $createTableQuery)) {
            echo "<h4>Table 'attempts' created successfully.</h4>";
        } else {
            echo "<h4>Error creating table: </h4>" . mysqli_error($conn);
        }
    } else {
        // Handle other errors
        echo "<h4>Error: " . mysqli_error($conn) . "</h4>";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $submissionDate = date('Y-m-d H:i:s');
    $firstname = trim($_POST["firstName"]);
    $lastname = trim($_POST["lastName"]);
    $studentNumber = trim($_POST["studentNumber"]);

    $firstname = htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8');
    $lastname = htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8');
    $studentNumber = htmlspecialchars($studentNumber, ENT_QUOTES, 'UTF-8');

    //Regex pattern for respective variables
    $firstnamePattern = '/^[a-zA-Z\s\-]{1,30}$/';
    $lastnamePattern = '/^[a-zA-Z\s\-]{1,30}$/';
    $studentIDPattern = '/^[0-9]{7,10}$/';



    // Perform validation checks for First name
    if (!preg_match($firstnamePattern, $firstname)) {
        $validation_error = "Invalid First Name";
    }

    // Perform validation checks for last name
    if (!preg_match($lastnamePattern, $lastname)) {
        $validation_error = "Invalid Last Name";
    }

    // Perform validation checks for student ID
    if (!preg_match($studentIDPattern, $studentNumber)) {
        $validation_error = "Invalid Student ID";
    }

?>
<body>
<div id="top-of-page"></div>
<?php include("menu.inc");?>
<div class="container">
    <div class="holder">
        <div ><?php

            if (isset($validation_error)) {
                echo"<div><img src='images/wrong.png'></div>";
                echo "<h4>$validation_error</h4>";
            }
            elseif (!isset($validation_error)) {
                $query_check_attempts = "SELECT COUNT(*) AS attempt_count FROM attempts WHERE Student_number = $studentNumber";
                $result_check_attempts = mysqli_query($conn, $query_check_attempts);
            }
            if ($result_check_attempts) {
                $row = mysqli_fetch_assoc($result_check_attempts);
                $attemptCount = $row["attempt_count"];

                if ($attemptCount >= 2) {
                    echo"<div><img src='images/wrong.png'></div>";
                    echo "<h4>Max attempts made by this student</h4>";
                } else {
                    $attemptNumber = $attemptCount + 1;
                    // Insert a new record into the attempts table
                    $query_insert_attempt = "INSERT INTO attempts (Date_time, First_name, Last_name, Student_number, Attempt, Score)
                                    VALUES ('$submissionDate', '$firstname', '$lastname', $studentNumber, $attemptNumber, $score)";
                    $result_insert_attempt = mysqli_query($conn, $query_insert_attempt);

                    if ($result_insert_attempt) {
                        echo"<div><img src='images/Ok.png'></div>";
                        echo "<h4 style='color: lawngreen'>Record inserted successfully</h4>";
                        echo "<h4>User: $firstname $lastname</h4>";
                        echo"<h4>ID: $studentNumber</h4>";
                        echo "<h4>Attempt Number: $attemptNumber</h4>";
                        echo"<br>";
                        if($score>5){
                            echo "<h4 style='color: lawngreen'>Score: $score</h4>";
                            echo "<h4 style='color: lawngreen'>Good Job!</h4>";
                        }
                        else{
                            echo "<h4 style='color: red'>Score: $score</h4>";
                            echo"<h4 style='color: red'>Try Again!</h4>";
                        }

                        if ($attemptNumber == 1) {
                            echo "<a href='4.1.Quiz.php'>Attempt the quiz again</a>";
                        }
                    } 
                    else 
                    {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            } 
            else 
            {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_close($conn);
            }
            ?>
    </div>
</div>
</body>
</html>