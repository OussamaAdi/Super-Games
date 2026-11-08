<?php
require_once "includes/init.php";

if (!is_logged_in()) {
    redirect("login.php");
}

$current_password_err = $new_password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $current_password = isset($_POST["current_password"]) ? (string) $_POST["current_password"] : "";

    // Reject forms that were not submitted from this page
    if (!csrf_valid()) {
        $current_password_err = "Your session expired. Please try again.";
    } elseif ($current_password === "") {
        $current_password_err = "Please enter your current password.";
    } else {
        // Refuse the change unless the current password verifies
        $user = db_row($con, "SELECT password FROM users WHERE id = ?", "i", [current_user_id()]);
        if (!$user || !password_matches($current_password, $user["password"])) {
            $current_password_err = "The current password you entered is not correct.";
        }
    }

    // New password: used exactly as typed, not trimmed
    $new_password = isset($_POST["new_password"]) ? (string) $_POST["new_password"] : "";
    if (trim($new_password) === "") {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen($new_password) < PASSWORD_MIN_LENGTH) {
        $new_password_err = "Password must have at least " . PASSWORD_MIN_LENGTH . " characters.";
    }

    $confirm_password = isset($_POST["confirm_password"]) ? (string) $_POST["confirm_password"] : "";
    if ($confirm_password === "") {
        $confirm_password_err = "Please confirm the password.";
    } elseif (empty($new_password_err) && $new_password !== $confirm_password) {
        $confirm_password_err = "Password did not match.";
    }

    if (empty($current_password_err) && empty($new_password_err) && empty($confirm_password_err)) {
        $updated = db_query($con, "UPDATE users SET password = ? WHERE id = ?", "si",
            [password_hash($new_password, PASSWORD_DEFAULT), current_user_id()]);

        if ($updated === true) {
            // Password changed: log out and sign in again with the new one
            session_destroy();
            redirect("login.php");
        }
        $new_password_err = "Something went wrong. Please try again later.";
    }
}

$page_title = "Reset Password";
include "includes/header.php";
?>
<div class="auth-form auth-reset">
    <h2>Reset Password</h2>
    <p>Please fill out this form to reset your password.</p>
    <form action="reset-password.php" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input id="current_password" type="password" name="current_password" class="form-control">
            <span class="form-error"><?php echo e($current_password_err); ?></span>
        </div>
        <div class="form-group">
            <label for="new_password">New Password</label>
            <input id="new_password" type="password" name="new_password" class="form-control">
            <span class="form-error"><?php echo e($new_password_err); ?></span>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input id="confirm_password" type="password" name="confirm_password" class="form-control">
            <span class="form-error"><?php echo e($confirm_password_err); ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-outline" value="Submit">
            <a class="btn btn-outline" href="index.php">Cancel</a>
        </div>
    </form>
</div>
<?php $show_footer = false; include "includes/footer.php"; ?>
