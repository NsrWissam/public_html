<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include '..\templates\header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title>About</title>
</head>
<body>
<?php include '..\templates\navbar.php'; ?>

<div class="container-fluid min-h-89 row">
    <?php include '..\templates\sidebar.php'; ?>
    <main class="col-sm-12 col-md-12 col-lg-10 col-xl-10 pt-3">
        <?php
        include '..\templates\report.php';

        include '..\about\about.php';
        ?>
    </main>
</div>
<?php
include '..\templates\footer.php';
?>
</body>

</html>


