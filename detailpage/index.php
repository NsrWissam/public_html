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
<?php include '..\templates\header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title>All Blogposts</title>
</head>
<body>
<?php include '..\templates\navbar.php'; ?>

<div class="container-fluid row min-h-89">
    <?php include '..\templates\sidebar.php'; ?>

    <main class="col-sm-12 col-md-12 col-lg-10 col-xl-10 pt-3">
        <?php
        include '..\templates\report.php';
        ?>
        <div id="pageSwap">
            <?php
            include '../detailpage/detailpage.php';
            ?>
        </div>
    </main>
</div>
<?php
include '..\templates\footer.php';
?>
</body>

</html>


