<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
include "connection.php";
include "header2.php";
require_once "csrf.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$current_password_err = $new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Reject forms that were not submitted from this page
    if (!csrf_valid()) {
        $current_password_err = "Your session expired. Please try again.";
    } elseif (empty(trim($_POST["current_password"]))) {
        $current_password_err = "Please enter your current password.";
    } else {
        // Check the current password; refuse the change unless it verifies
        $current_ok = false;
        $sql = "SELECT password FROM users WHERE id = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $_SESSION["id"];

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_bind_result($stmt, $hashed_password);
                // Passwords are trimmed at sign-up and login, so trim here too
                if (mysqli_stmt_fetch($stmt) && password_verify(trim($_POST["current_password"]), $hashed_password)) {
                    $current_ok = true;
                }
            }
            mysqli_stmt_close($stmt);
        }

        if (!$current_ok) {
            $current_password_err = "The current password you entered is not correct.";
        }
    }

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have atleast 6 characters.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($current_password_err) && empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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
    <br><br>
    <div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group <?php echo (!empty($current_password_err)) ? 'has-error' : ''; ?>">
                <label>Current Password</label>
                <input type="password" name="current_password" class="form-control">
                <span class="help-block"><?php echo $current_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input id="submit" type="submit" class="btn btn-primary" value="Submit">
                <a id="cancel" class="btn btn-link" href="index.php">Cancel</a>
            </div>
        </form>
    </div>
</body>

<style type="text/css">
    .wrapper {
        width: 500px;
        padding: 30px;
        font-size: 20px;
        margin-left: auto;
        margin-right: auto;
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
    #cancel {
        color: grey;
        border: 2px solid grey;
        background-color: rgb(20, 20, 20);
        transition-duration: 0.3s;
        text-decoration: none;
    }
    #cancel:hover {
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