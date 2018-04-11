<?php
require_once '../database/BlogpostDB.php';
require_once '../database/CategoryDB.php';
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['logged_in'] == false || !isset($_SESSION['logged_in'])){
    header('location: http://localhost/public_html/');
    exit;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['submitPost'])) {
        $post = new Blogpost("",$_POST['title'],"",$_POST['posttext'],$_POST['image'],$_POST['category'],"");
        BlogpostDB::makePost($post);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'C:\wamp64\www\public_html\templates\header.php'; ?>
<head>
    <title>Post blog</title>
</head>
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php include 'C:\wamp64\www\public_html\templates\sidebar.php'; ?>
        <main class="col-sm-9 col-md-10 pt-3 pl-3">
            <?php
            include 'C:\wamp64\www\public_html\templates\report.php';

            include 'C:\wamp64\www\public_html\makepost\makepost.php';
            ?>
        </main>
    </div>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>
</html>


