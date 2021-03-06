<?php
include_once '../database/BlogpostDB.php';
include_once '../database/CategoryDB.php';
include_once '../database/UserDB.php';

if (!isset($_SESSION)) {
    session_start();
}

if ($_SESSION['logged_in'] == false || !isset($_SESSION['logged_in'])) {
    $_SESSION['message'] = "You are not logged in yet. If you wish to create a blog post, log in first";
    $_SESSION['report_code'] = 'error';
    header('location: ../home/');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submitPost'])) {
        $post = new Blogpost("", $_POST['title'], "", $_POST['posttext'], $_POST['image'], $_POST['category'], "");
        BlogpostDB::makePost($post);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include '..\templates\header.php'; ?>
<head>
    <title>Post blog</title>
</head>
<body>
<?php include '..\templates\navbar.php'; ?>
<div class="container-fluid min-h-89 row">
    <?php include '..\templates\sidebar.php'; ?>
    <main class="col-sm-12 col-md-12 col-lg-10 col-xl-10 pt-3">
        <?php
        include '..\templates\report.php';
        ?>
        <div id="pageSwap">
            <?php
            include '..\makepost\makepost.php';
            ?>
        </div>
    </main>
</div>
<?php
include '..\templates\footer.php';
?>
</body>
</html>


