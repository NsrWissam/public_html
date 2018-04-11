<?php
if(!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include 'C:\wamp64\www\public_html\templates\header.php'; ?>
<head>
    <title>About</title>
</head>
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>

<div class="container-fluid h-89">
    <div class="row h-100">

        <?php include 'C:\wamp64\www\public_html\templates\sidebar.php'; ?>
        <main class="col-sm-9 col-md-10 pt-3">
        <?php
        include 'C:\wamp64\www\public_html\templates\report.php';

        include 'C:\wamp64\www\public_html\about\about.php';
        ?>
        </main>
    </div>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>

</html>


