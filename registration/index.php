<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['logged_in'] == true) {
        $_SESSION['message'] = "You are already logged in. If you wish to create a new account, log out first";
        $_SESSION['report_code'] = 'error';
        header('location: http://localhost/public_html/');
        exit;
    }
}
require_once '../database/UserDB.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register']) && ($_POST['password'] == $_POST['ConfirmPasw'])) {
        $user = new User("", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], "", "", "");
        UserDB::register($user);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'C:\wamp64\www\public_html\templates\header.php'; ?>
<head>
    <title>Sign-Up Form</title>
</head>
<body style="background-color: lightgrey">
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>
<div class="container-fluid row min-h-89 pr-0 mr-0">
    <main class="col-12 pt-3">
            <?php
            include 'C:\wamp64\www\public_html\registration\register.php';
            ?>
    </main>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>
</html>