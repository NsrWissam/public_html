<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../database/BlogpostDB.php';
include_once '../database/CategoryDB.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'C:\wamp64\www\public_html\templates\header.php'; ?>
<head>
    <title>My Blog</title>
</head>
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>

<div class="container-fluid h-89 row">
    <main class="col-12 pt-3">
        <?php
        include 'C:\wamp64\www\public_html\templates\report.php';

        include 'C:\wamp64\www\public_html\home\home.php';
        ?>
    </main>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>

</html>


