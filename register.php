<?php
require_once "connection.php";
require_once "auth.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[A-Za-z0-9_]{3,20}$/', trim($_POST["username"]))) {
        $username_err = "Username must be 3-20 characters: letters, numbers and underscores only.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password (used exactly as typed, not trimmed)
    $password = isset($_POST["password"]) ? (string) $_POST["password"] : "";
    if (trim($password) === "") {
        $password = "";
        $password_err = "Please enter a password.";
    } elseif (strlen($password) < PASSWORD_MIN_LENGTH) {
        $password_err = "Password must have at least " . PASSWORD_MIN_LENGTH . " characters.";
    }

    // Validate confirm password
    $confirm_password = isset($_POST["confirm_password"]) ? (string) $_POST["confirm_password"] : "";
    if ($confirm_password === "") {
        $confirm_password_err = "Please confirm password.";
    } elseif (empty($password_err) && ($password !== $confirm_password)) {
        $confirm_password_err = "Password did not match.";
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        // Create the user and their cart/library rows together
        mysqli_begin_transaction($con);
        $created = false;

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($con, $sql)) {
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            if (mysqli_stmt_execute($stmt)) {
                $created = ensure_user_rows($con, mysqli_insert_id($con));
            } elseif (mysqli_stmt_errno($stmt) == 1062) {
                // Someone else took the name between the check above and this insert
                $username_err = "This username is already taken.";
            }
            mysqli_stmt_close($stmt);
        }

        if ($created) {
            mysqli_commit($con);
            header("location: login.php");
            exit;
        }

        mysqli_rollback($con);
        if (empty($username_err)) {
            echo "Something went wrong. Please try again later.";
        }
    }
}

include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/all.min.js"></script>
</head>

<body>



    <br>
    <div class="container">
        <div style="color: white;" class="wrapper">
            <h2 id="signup">Sign Up</h2>
            <p>Please fill this form to create an account.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input id="submit" type="submit" class="btn btn-primary" value="Submit">
                    <input id="reset" type="reset" class="btn btn-default" value="Reset">
                </div>
                <p>Already have an account? <a id="link" href="login.php">Login here</a>.</p>
            </form>
        </div>
    </div>
</body>





<style type="text/css">
    .wrapper {
        width: 500px;
        padding: 30px;
        font-size: 20px;
        margin-left: auto;
        margin-right: auto;
    }
    #signup {
        font-size: 27px;
    }

    #link {
        text-decoration: none;
    }
    #link:hover {
        color: white;
    }

    #submit {
        color: grey;
        border: 2px solid grey;
        background-color: rgb(20, 20, 20);
        transition-duration: 0.3s;
    }
    #submit:hover {
        color: white;
        border: 2px solid rgb(0, 124, 248);
        background-color: rgb(20, 20, 20);
    }

    #reset {
        color: grey;
        border: 2px solid grey;
        background-color: rgb(20, 20, 20);
        transition-duration: 0.3s;
    }
    #reset:hover {
        color: white;
        border: 2px solid rgb(0, 124, 248);
        background-color: rgb(20, 20, 20);
    }

    #img {
        height: 60px;
        width: 70px;
        margin-left: -17px;
        margin-right: 17px;
        margin-top: 3px;
        padding: 0px;
    }

    #ul {
        list-style-type: none;
        margin: 0;
        overflow: hidden;
        background-color: rgb(42, 42, 42);
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 99;
        text-decoration: none;

    }

    #li {
        float: left;
        text-decoration: none;
        padding: 0px;
    }

    #li a {
        display: block;
        color: rgb(214, 214, 214);
        text-align: center;
        padding: 18px 19px;
        text-decoration: none;
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(42, 42, 42);
        transition-duration: 0.4s;
    }

    #li a:hover {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(0, 124, 248);
        color: white;
        padding: 18px 24px 18px 24px;
    }

    #li a.active5 {
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 4px solid rgb(0, 124, 248);
        color: white;
    }

    #log {
        margin: 0px;
        padding: 0px;
    }
</style>

</html>