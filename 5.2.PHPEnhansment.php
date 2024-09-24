<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enhancements</title>
    <link rel="stylesheet" href="styles/5.Enhancements.css">
    <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
    <link rel="icon" href="images/enhancement-icon.png">

    <!-- Used for synatax highlighting -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/github-gist.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/languages/php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/languages/sql.min.js"></script>
</head>

<body>
<div id="top-of-page"></div>
<?php include("menu.inc");?>
<div class="container">
    <h1>PHP Enhancements</h1>
    <div class="enhancement">
        <h2>1. Manage PHP Login</h2>
        <h3>Click This Button</h3>
        <div class="button">
            <a href="7.1.Manage_Entrance.php"><img src="images/enhancement-icon.png" alt="Button to go to about page"></a>
        </div>
        <h4 id="ftp">Here's How we implemented this feature</h4> <br>

            <div class="heading" id="top"><span style="color: Red">SQL Query</span></div>
            <div class="description">
                The following sql query searches the table admin with the respective username and password entered .
                This result will be saved to a variable, that variable is checked to see if there is a row present with the entered username and password.
            </div>

            <div class="code-snip"><pre><code class="sql">
            SELECT * FROM `admin` WHERE BINARY username = '$username' AND BINARY password = '$password'
            </code></pre>
        </div>


        <div class="heading"><span style="color: blue">PHP</span></div>
            <div class="description">
                When the user enters a username and password the following code does the logic to check if the user should be permitted to the website or not. This has been used as a function and will return true or false if the username and password is valid or not respectively.
                The variable username and password contains the information entered in the form of the login page.
            </div>
            <div class="code-snip">
            <pre><code class="php">
            function login_auth($username, $password, $conn){
            $sql = "SELECT * FROM `admin` WHERE BINARY username = '$username' AND BINARY password ='$password'";
                try {
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows === 1) {
                        $_SESSION["username"] = $username;
                        return true;
                    }
                    else{
                        return false;
                    }
                } catch (mysqli_sql_exception) {
                    echo "Database Error: " . mysqli_error($conn);
                }
            }
            </code></pre>
                <div class="description">
                    We have also implemented code to ensure that even in the scenario of database migration if the table does not exist the code automatically creates a table named admin with the default username and password.
                </div>

        </div>

        <div class="heading"><span style="color: Red">SQL Query</span></div>
            <div class="code-snip">
            <pre><code class="sql">
            CREATE TABLE admin (
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL)";

            "INSERT INTO admin (username, password) VALUES ('username', 'password')";
            </code></pre>

        </div>
        <div class="description">
            The above sql commands are sent an sql query which will create the table and the username password. <br>
            (The username and password used above are not the default values)
        </div>

        <h2>2. Secure Access to the management interface.</h2>


        <div class="description">
            We have implemented 4 features to improve the security of the webpage <br>
            <br>
            <b><u>1. Disabling access to the supervisor page if more than 3 unsuccessful attempts are made</u></b><br><br>
            The following code has been used to serve the functionality of disabling the user to continuously enter username and passwords. <br>
            After 3 unsuccessful login attempts the user has to wait 30 seconds until re-trying.  <br>
            This will slow down hackers trying to brute force the website's admin pages username and password. <br>
            A session variable named attempt_count  is used to save the number of unsuccessful attempts made. This variable is not reset even if the browser is refreshed. <br>
            There is also another session variable named lockout_time which will save the time when an invalid attempt is made. <br>
            When an invalid attempt is made the time is updated and the attempt count is incremented by one. <br>

            When the number of attempts reach 3 and 30 seconds has not passed since the last login the user is restricted from making sql queries and entering the Supervisor page. <br>
        </div>
        <div class="heading"><span style="color: blue">PHP</span></div>
    <div class="code-snip">
    <pre><code class="php">
    $lockout_duration = 30;
    $max_attempts = 3;

    if (!isset($_SESSION['attempt_count'])) {
        $_SESSION['attempt_count'] = 0;
    }

    if ($_SESSION['attempt_count'] >= $max_attempts && time() - $_SESSION['lockout_time'] &lt; $lockout_duration) {
            $timeleft =  $lockout_duration - (time() - $_SESSION['lockout_time']);
            echo "Sorry wait please wait {$timeleft} seconds";
        }
        else {
            if (login_auth($username, $password, $conn) == false) {
                echo "Incorrect username or password";
                $_SESSION['attempt_count']++;
                $_SESSION['lockout_time'] = time();
            }
            else if(login_auth($username, $password, $conn) == true){
                $_SESSION['attempt_count'] = 0;
                header("Location: 7.2.Manage.php");
            }
        }

    </code></pre>
    </div> <br>
        <div class="description">
            <b><u>2. Redirecting the user if they try to directly access the supervisors page via the url.</u></b> <br><br>
            The user is directed back the Admin Login interface if they have not used the login interface to login via a valid username and password. A session variable named username is saved when the user has entered a valid username.
            The following code is implemented in the management page (manage.php). This ensures that admins with valid usernames and password are the only users able to access the supervisors management interface.
        </div>
        <div class="heading"><span style="color: blue">PHP</span></div>
    <div class="code-snip">
    <pre><code class="php">
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: 7.1.Manage_Entrance.php");
        exit;
    }
    </code></pre>
    </div> <br><br>
        <div class="description">
            <b><u>3. Log Out button in the supervisor page</u></b> <br><br>
            Since we use sessions variables to verify that the a user has entered a valid username and password it is important the unset and destroy those sessions before a user leaves the supervisor page (manage.php). The following code has been implemented to ensure that user that might use the same computer after a supervisor has used it does not have access to the Management interface when the logout button is pressed.
        </div>
        <div class="heading"><span style="color: blue">PHP</span></div>
    <div class="code-snip">
    <pre><code class="php">
    if(isset($_POST["logout"])){
        header("Location: 7.1.Manage_Entrance.php");
        session_unset();
        session_write_close();
        exit;
    }
    </code></pre> </div>

    <div class="description">
        <b><u>4. Sanitization of username and password to prevent cross-site scripting and SQL Injections</u></b>
    </div>

        <div class="heading"><span style="color: blue">PHP</span></div>
    <div class="code-snip">
    <pre><code class="php">
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    </code></pre>
    </div>





</div>
</div>

<?php
include "footer.inc";
?>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });
    });
</script>

</body>
</html>