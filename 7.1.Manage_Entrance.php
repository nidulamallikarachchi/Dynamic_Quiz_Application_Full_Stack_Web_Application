<?php
global $conn;
session_start();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Manage</title>
        <link rel="stylesheet" href="styles/7.1.Manage_Entrance.css">
        <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
        <link rel="icon" href="images/settings_FILL0_wght400_GRAD0_opsz24.png">
        <script>
            function showError(message) {
                var errorMessage = document.getElementById("error-message");
                errorMessage.textContent = message;
                errorMessage.style.display = "block";
            }
        </script>
    </head>

    <body>
    <?php include("menu.inc");?>
    <div class="container">
        <div>
            <form action="7.1.Manage_Entrance.php" method="post">
                <h1>Administrator Login</h1>
                <h3>Enter username</h3>
                <label><input type="text" name="username"></label>
                <h3>Enter Password</h3>
                <label><input type="password" name="password"></label>
                <button type="submit" class="submit" name="submit">Login</button>
            </form>
        </div>
    </div>



<?php
include("header.inc");


$tableExists = mysqli_query($conn, "SELECT 1 FROM admin");
if (!$tableExists) {
    if (mysqli_errno($conn) == 1146) {
        // Table does not exist, create it
        $createTableQuery = "CREATE TABLE admin (
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )";
        $insert_data = "INSERT INTO admin (username, password) VALUES ('SWIN@admin', 'SWIN@admin')";
        if (mysqli_query($conn, $createTableQuery)) {
            echo "<div class='text'> Table 'admin' created successfully. </div>";
            if (mysqli_query($conn, $insert_data)) {
                echo "<div class='text'> Data inserted successfully. </div>".  "<br>" ;
            } else {
                echo "<div class='text'> Error: </div>". mysqli_error($conn);
            }
        } 
        else {
            echo " <div class='text'>Error creating table: </div>" . mysqli_error($conn);
        }
    } else {
        // Handle other errors
        echo "<h4>Error: " . mysqli_error($conn) . "</h4>";
    }
}

//For maximum security the amount of wait time and max attempts until lockout
$lockout_duration = 30;
$max_attempts = 3;

if (!isset($_SESSION['attempt_count'])) {
    $_SESSION['attempt_count'] = 0;
}


//Check if the input username and password are valid , returning true if valid otherwise false
function login_auth($username, $password, $conn){
    $sql = "SELECT * FROM `admin` WHERE BINARY username = '$username' AND BINARY password = '$password'";

    try {
        $result = mysqli_query($conn, $sql);
        if ($result && $result->num_rows === 1) {
            //Saving the username to session (This is used to check and see if the user is already logged in before entering manage.php)
            $_SESSION["username"] = $username;
            return true;
        }
        else{
            return false;
        }
    } catch (mysqli_sql_exception $e) {
        echo "<div class='text'> Database Error: </div>" . mysqli_error($conn);
    }
}

if(!empty($_POST["username"]) && (!empty($_POST["password"]))){

    //Input sanitization
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);


    if ($_SESSION['attempt_count'] >= $max_attempts && time() - $_SESSION['lockout_time'] < $lockout_duration) {

        //Calculating the amount of time left until attempt can be made
        $timeleft =  $lockout_duration - (time() - $_SESSION['lockout_time']);

        //Printing amount of time to wait
        echo "<div class='text'>Sorry wait please wait {$timeleft} seconds</div>";
    }
    else {
        if (login_auth($username, $password, $conn) == false) {

            echo "<div class='text'> Incorrect username or password</div>";
            //Increment the number of attempts if unsuccessful
            $_SESSION['attempt_count']++;
            $_SESSION['lockout_time'] = time();
        }
        else if(login_auth($username, $password, $conn) == true){

            // Successful login, reset the attempt count
            $_SESSION['attempt_count'] = 0;
            header("Location: 7.2.Manage.php");
        }
    }
}
elseif (!empty($_POST["username"])) {
    echo "<div class='text'>Enter a Password</div>";
}
elseif (!empty($_POST["password"])) {
    echo "<div class='text'> Enter a Username </div>";
}
$conn ->close();

if(isset($_POST["logout"])){
    header("Location: 7.1.Manage_Entrance.php");
    session_unset();
    session_write_close();
    exit;
}
?>
    </body>
</html>
