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
    <title>All Blogposts</title>
</head>
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>

<div class="container-fluid row min-h-89">
    <?php include 'C:\wamp64\www\public_html\templates\sidebar.php'; ?>

    <main class="col-sm-12 col-md-12 col-lg-10 col-xl-10 pt-3">
        <?php
        include 'C:\wamp64\www\public_html\templates\report.php';
        ?>
        <div id="pageSwap">
            <?php
            include 'C:\wamp64\www\public_html\allposts\allposts.php';
            ?>
        </div>
    </main>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>

</html>


