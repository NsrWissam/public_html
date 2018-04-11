<?php
if(!isset($_SESSION)) {
    session_start();
}
require_once '../database/UserDB.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $user = new User("",$_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password'], "", "", "");
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
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php include 'C:\wamp64\www\public_html\templates\sidebar.php'; ?>
        <main class="col-sm-9 col-md-10 pt-3" style="background-color: lightgrey">
            <div class="row">
                <?php
                include 'C:\wamp64\www\public_html\registration\register.php';
                ?>
            </div>
        </main>
    </div>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>
</html>