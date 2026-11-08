<?php
require_once "includes/init.php";

$username = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Username: 3-20 letters, numbers or underscores, not taken yet
    $wanted = trim(isset($_POST["username"]) ? (string) $_POST["username"] : "");
    if ($wanted === "") {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[A-Za-z0-9_]{3,20}$/', $wanted)) {
        $username_err = "Username must be 3-20 characters: letters, numbers and underscores only.";
    } elseif (db_row($con, "SELECT id FROM users WHERE username = ?", "s", [$wanted])) {
        $username_err = "This username is already taken.";
    } else {
        $username = $wanted;
    }

    // Password: used exactly as typed, not trimmed
    $password = isset($_POST["password"]) ? (string) $_POST["password"] : "";
    if (trim($password) === "") {
        $password_err = "Please enter a password.";
    } elseif (strlen($password) < PASSWORD_MIN_LENGTH) {
        $password_err = "Password must have at least " . PASSWORD_MIN_LENGTH . " characters.";
    }

    $confirm_password = isset($_POST["confirm_password"]) ? (string) $_POST["confirm_password"] : "";
    if ($confirm_password === "") {
        $confirm_password_err = "Please confirm password.";
    } elseif (empty($password_err) && $password !== $confirm_password) {
        $confirm_password_err = "Password did not match.";
    }

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $created = db_query($con, "INSERT INTO users (username, password) VALUES (?, ?)", "ss",
            [$username, password_hash($password, PASSWORD_DEFAULT)]);

        if ($created === true) {
            redirect("login.php");
        }
        if (db_last_error() == 1062) {
            // Someone else took the name between the check above and the insert
            $username_err = "This username is already taken.";
        } else {
            $username_err = "Something went wrong. Please try again later.";
        }
    }
}

$page_title = "Sign Up";
$active_nav = "signup";
include "includes/header.php";
?>
<div class="container"><div class="auth-form auth-signup">
    <h2>Sign Up</h2>
    <p>Please fill this form to create an account.</p>
    <form action="register.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" class="form-control" value="<?php echo e($username); ?>">
            <span class="form-error"><?php echo e($username_err); ?></span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control">
            <span class="form-error"><?php echo e($password_err); ?></span>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input id="confirm_password" type="password" name="confirm_password" class="form-control">
            <span class="form-error"><?php echo e($confirm_password_err); ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-outline" value="Submit">
            <input type="reset" class="btn btn-outline" value="Reset">
        </div>
        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</div></div>
<?php $show_footer = false; include "includes/footer.php"; ?>
