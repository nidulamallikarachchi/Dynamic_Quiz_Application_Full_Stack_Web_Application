<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Records</title>
    <link rel="stylesheet" href="styles/7.2.Manage.css">
    <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
    <link rel="icon" href="images/settings_FILL0_wght400_GRAD0_opsz24.png">
</head>

<?php
include("header.inc");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: 7.1.Manage_Entrance.php");
    exit;
}
?>

<body>
<?php
include("menu.inc");
?>

<div class="container">
    <div class="main-table">
        <?php
        global $conn;
        $sql = "SELECT * FROM `attempts`";

        if (isset($_POST['list_all'])) {
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    echo "<h2>All Records</h2>";
                    echo "<table>
                        <tr>
                            <th>Attempt ID</th>
                            <th>Date & Time</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Student Number</th>
                            <th>Attempt</th>
                            <th>Score</th>
                        </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['Attempt_id']."</td>
                            <td>".$row['Date_time']."</td>
                            <td>".$row['First_name']."</td>
                            <td>".$row['Last_name']."</td>
                            <td>".$row['Student_number']."</td>
                            <td>".$row['Attempt']."</td>
                            <td>".$row['Score']."</td>
                        </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "No records found.";
                }
            }
        }
        ?>
    </div>

    <div id="studentidfilter">
        <script>
            function showFilteredMessage(message, backgroundColor) {
                var messageDiv = document.createElement("div");
                messageDiv.style.borderRadius = "20px"
                messageDiv.style.backgroundColor = backgroundColor;
                messageDiv.style.color = "white";
                messageDiv.style.padding = "10px";
                messageDiv.style.position = "fixed";
                messageDiv.style.top = "50%";
                messageDiv.style.left = "50%";
                messageDiv.style.transform = "translate(-50%, -50%)";
                messageDiv.style.opacity = 1;
                messageDiv.style.transition = "opacity 1s, visibility 1s";

                messageDiv.innerHTML = message;
                document.body.appendChild(messageDiv);

                setTimeout(function() {
                    messageDiv.style.opacity = 0;
                    setTimeout(function() {
                        messageDiv.style.visibility = "hidden";
                    }, 500);
                }, 1000);
            }
        </script>
        <?php
        if (isset($_POST['filter'])) {
            if (!empty($_POST['studentNumber'])) {
                $searchTerm = $_POST['studentNumber'];
            }
            else {
                $searchTerm = $_POST['student_name'];
            }

            $sql = "SELECT * FROM attempts WHERE Student_number = '$searchTerm' OR CONCAT(First_name, ' ', Last_name) = '$searchTerm'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    $filteredMessage = "Filtered Records for Student Number: $searchTerm";
                    echo "<h2>Filtered Records</h2>";
                    echo "<script>showFilteredMessage('$filteredMessage', 'green');</script>";
                    echo "<table>
            <tr>
                <th>Attempt ID</th>
                <th>Date & Time</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Student Number</th>
                <th>Attempt</th>
                <th>Score</th>
            </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                <td>".$row['Attempt_id']."</td>
                <td>".$row['Date_time']."</td>
                <td>".$row['First_name']."</td>
                <td>".$row['Last_name']."</td>
                <td>".$row['Student_number']."</td>
                <td>".$row['Attempt']."</td>
                <td>".$row['Score']."</td>
            </tr>";
                    }

                    echo "</table>";
                }
                elseif (!empty($_POST['student_name'])) {
                    $errorMessage = "No records found for Student Name : $searchTerm";
                    echo "<script>showFilteredMessage('$errorMessage', 'red');</script>";
                }
                else {
                    $errorMessage = "No records found for Student Number: $searchTerm";
                    echo "<script>showFilteredMessage('$errorMessage', 'red');</script>";
                }
            }
        }
        ?>
    </div>

    <div>
        <script>
            function showMessageWithBackground(message, backgroundColor) {
                var messageDiv = document.createElement("div");
                messageDiv.style.borderRadius = "20px"
                messageDiv.style.backgroundColor = backgroundColor;
                messageDiv.style.color = "white";
                messageDiv.style.padding = "10px";
                messageDiv.style.position = "fixed";
                messageDiv.style.top = "50%";
                messageDiv.style.left = "50%";
                messageDiv.style.transform = "translate(-50%, -50%)";
                messageDiv.style.opacity = 1;
                messageDiv.style.transition = "opacity 1s, visibility 1s";

                messageDiv.innerHTML = message;
                document.body.appendChild(messageDiv);

                setTimeout(function() {
                    messageDiv.style.opacity = 0;
                    setTimeout(function() {
                        messageDiv.style.visibility = "hidden";
                    }, 500);
                }, 1000);
            }
        </script>
        <?php
        if (isset($_POST['filter_low_score'])) {
            $sql = "SELECT * FROM attempts WHERE Score < 5 AND Attempt = 2";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    $successMessage = "Records with Score Less than 50%";
                    echo "<script>showMessageWithBackground('$successMessage', 'green');</script>";
                    echo "<h2>Records with Score Less than 50%</h2>";
                    echo "<table>
                <tr>


                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Student Number</th>
                    <th>Attempt</th>
                    <th>Score</th>
                </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                    <td>".$row['First_name']."</td>
                    <td>".$row['Last_name']."</td>
                    <td>".$row['Student_number']."</td>
                    <td>".$row['Attempt']."</td>
                    <td>".$row['Score']."</td>
                </tr>";
                    }

                    echo "</table>";
                } else {
                    $errorMessage = "No records found with Score Less than 50%";
                    echo "<script>showMessageWithBackground('$errorMessage', 'red');</script>";
                }
            }
        }
        ?>
    </div>

    <div>
        <script>
            function showMessageWithStyling(message, backgroundColor, borderRadius) {
                var messageDiv = document.createElement("div");
                messageDiv.style.backgroundColor = backgroundColor;
                messageDiv.style.color = "white";
                messageDiv.style.padding = "10px";
                messageDiv.style.borderRadius = borderRadius;
                messageDiv.style.position = "fixed";
                messageDiv.style.top = "50%";
                messageDiv.style.left = "50%";
                messageDiv.style.transform = "translate(-50%, -50%)";
                messageDiv.style.opacity = 1;
                messageDiv.style.transition = "opacity 1s, visibility 1s";

                messageDiv.innerHTML = message;
                document.body.appendChild(messageDiv);

                setTimeout(function() {
                    messageDiv.style.opacity = 0;
                    setTimeout(function() {
                        messageDiv.style.visibility = "hidden";
                        document.body.removeChild(messageDiv);
                    }, 500);
                }, 1000);
            }
        </script>
        <?php
        if (isset($_POST['filter_100_score'])) {
            $sql = "SELECT * FROM attempts WHERE Attempt = 1 AND Score = 10";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    $successMessage = "Records with Attempt ID = 1 and Score = 100%";
                    echo "<script>showMessageWithStyling('$successMessage', 'green', '20px');</script>";
                    echo "<h2>Records with a Score of 100%</h2>";
                    echo "<table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Student Number</th>
                    <th>Attempt</th>
                    <th>Score</th>
                </tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                    <td>".$row['First_name']."</td>
                    <td>".$row['Last_name']."</td>
                    <td>".$row['Student_number']."</td>
                    <td>".$row['Attempt']."</td>
                    <td>".$row['Score']."</td>
                </tr>";
                    }

                    echo "</table>";
                } else {
                    $errorMessage = "No records found with Attempt ID = 1 and Score = 100%";
                    echo "<script>showMessageWithStyling('$errorMessage', 'red', '20px');</script>";
                }
            }
        }
        ?>
    </div>

    <div>
        <script>
            function showMessage(message) {
                var messageDiv = document.createElement("div");
                messageDiv.style.borderRadius = "20px";
                messageDiv.style.backgroundColor = "red";
                messageDiv.style.color = "white";
                messageDiv.style.padding = "10px";
                messageDiv.style.position = "fixed";
                messageDiv.style.top = "50%";
                messageDiv.style.left = "50%";
                messageDiv.style.transform = "translate(-50%, -50%)";
                messageDiv.style.opacity = 1;
                messageDiv.style.transition = "opacity 1s, visibility 1s";

                messageDiv.innerHTML = message;
                document.body.appendChild(messageDiv);

                setTimeout(function() {
                    messageDiv.style.opacity = 0;
                    setTimeout(function() {
                        messageDiv.style.visibility = "hidden";
                    }, 500);
                }, 1000);
            }
        </script>
        <?php
        if (isset($_POST['delete'])) {
            $studentNumber = $_POST['studentNumberDelete'];
            $sql = "SELECT * FROM attempts WHERE Student_number = '$studentNumber'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if ($result->num_rows > 0) {
                    $sql = "DELETE FROM attempts WHERE Student_number = '$studentNumber'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $deleteSuccessMessage = "Record with Student Number: $studentNumber has been deleted successfully.";
                        echo "<script>showMessage('$deleteSuccessMessage');</script>";
                    }
                }
                else {
                    $errorMessage = "Invalid Student Number";
                    echo "<script>showMessage('$errorMessage');</script>";
                }
            }
        }
        ?>
    </div>
    <div>
        <script>
            function showUpdate(message) {
                var messageDiv = document.createElement("div");
                messageDiv.style.borderRadius = "20px";
                messageDiv.style.backgroundColor = "red";
                messageDiv.style.color = "white";
                messageDiv.style.padding = "10px";
                messageDiv.style.position = "fixed";
                messageDiv.style.top = "50%";
                messageDiv.style.left = "50%";
                messageDiv.style.transform = "translate(-50%, -50%)";
                messageDiv.style.opacity = 1;
                messageDiv.style.transition = "opacity 1s, visibility 1s";

                messageDiv.innerHTML = message;
                document.body.appendChild(messageDiv);

                setTimeout(function() {
                    messageDiv.style.opacity = 0;
                    setTimeout(function() {
                        messageDiv.style.visibility = "hidden";
                    }, 500);
                }, 1000);
            }
        </script>
    <?php
    if (isset($_POST['Change_Score'])) {
        $studentID_Chg = $_POST['student_Chg'];
        $attemptNumber = $_POST['attempt_chg'];
        $newScore = $_POST['score_chg'];

        $sql = "SELECT * FROM attempts WHERE Student_number = '$studentID_Chg' AND Attempt = '$attemptNumber'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if ($result->num_rows > 0) {
                $query = "UPDATE attempts SET Score = '$newScore' WHERE Student_number = '$studentID_Chg' AND Attempt = '$attemptNumber'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    $updatesucess =  "Score for Student ID $studentID_Chg, Attempt $attemptNumber has been updated to $newScore.";
                    echo "<script>showUpdate('$updatesucess', 'green');</script>";
                }
            }
            else {
                    $errorMessage = "Invalid Student Number or Attempt Number";
                    echo "<script>showUpdate('$errorMessage','red');</script>";
                }
            }
        }
    
    ?>
    </div>

<div class="control-panel">
    <h1 style="color: red; text-decoration: underline">Control Panel</h1>

    <div class="box">
        <h2>List All Attempts</h2>
        <form method="post">
            <input type="submit" class="myButton" name="list_all" value="List Attempts" >
        </form>
    </div>

    <div class="box">
        <form method="post">
            <h2>Find a Student</h2>
            <h3>Student ID: </h3> 
            <label><input type="text" placeholder="Enter Either Name or Student ID" name="studentNumber" minlength="7" maxlength="10" pattern="[0-9]{7,10}"></label> 

            <h3> Name : </h3>
            <label><input type="text" placeholder="Enter Either Name or Student ID" name="student_name" maxlength="30" pattern="^[a-zA-Z\- ]{1,30}$"></label> <br> <br>
            <input type="submit"  class="myButton" name="filter" value="Find">
        </form>
    </div>

    <div class="box">
        <h2>Filter Scores Less Than 50% on Second Attempt</h2>
        <form method="post">
            <input type="submit" class="myButton" name="filter_low_score" value="Filter">
        </form>
    </div>

    <div class="box">
        <h2>Filter 100% Scores on First Attempt</h2>
        <form method="post">
            <input type="submit" class="myButton" name="filter_100_score" value="Filter">
        </form>
    </div>

    <div class="box">
        <h2>Delete Record</h2>
        <form method="post">
            <h3>Student ID: </h3>
            <label for="studentNumberDelete"><input type="text" name="studentNumberDelete" id="studentNumberDelete" minlength="7" maxlength="10" pattern="[0-9]{7,10}" required></label> <br> <br>
            <input type="submit" name="delete" value="Delete" id="delete">
        </form>
    </div>

    <div class="box">
        <h2>Change Score</h2>
        <form method="post">
            <h3> Enter Student ID to Change Score:</h3>
            <label for="student_Chg"><input type="text" name="student_Chg" id="student_Chg" minlength="7" maxlength="10" pattern="[0-9]{7,10}" required></label>
            <h3> Attempt Number: </h3>
            <label for="attempt_chg"><input type="text" name="attempt_chg" id="attempt_chg" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required></label>
            <h3> New Score: </h3>
            <label for="score_chg"><input type="text" name="score_chg" id="score_chg" minlength="1" maxlength="2" pattern="[0-9]{1,2}" required></label>
            <br><br>
            <input type="submit" name = "Change_Score" value="Change Score">
        </form>
    </div>

    <div class="box">
        <form action="7.1.Manage_Entrance.php" method="post" class="log-out">
            <input type="submit" name="logout" value="Log-Out">
        </form>
    </div>
</div>
</div>

<?php
$conn ->close();
?>

</body>
</html>