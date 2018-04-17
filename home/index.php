<?php
include_once '../database/BlogpostDB.php';
include_once '../database/CategoryDB.php';
include_once '../database/UserDB.php';
include_once '../database/CommentDB.php';

if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'C:\wamp64\www\public_html\templates\header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>

<div class="container-fluid min-h-89 row ml-0">
    <main class="col-12 pt-3">
        <?php
        include 'C:\wamp64\www\public_html\templates\report.php';
        ?>
        <div id="pageSwap">
            <?php
            include 'C:\wamp64\www\public_html\home\home.php';
            ?>
        </div>
    </main>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>

</html>


