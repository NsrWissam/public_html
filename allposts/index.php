<?php
include_once '../database/BlogpostDB.php';
include_once '../database/UserDB.php';
include_once '../database/CategoryDB.php';
if(!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'C:\wamp64\www\public_html\templates\header.php'; ?>
<head>
    <title>All Blogposts</title>
</head>
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include 'C:\wamp64\www\public_html\templates\sidebar.php'; ?>
        <main class="col-sm-9 col-md-10 pt-3">
            <?php
            include 'C:\wamp64\www\public_html\templates\report.php';

            include 'C:\wamp64\www\public_html\allposts\allposts.php';
            ?>
        </main>
    </div>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>

</html>

