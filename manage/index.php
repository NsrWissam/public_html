<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once '../database/CategoryDB.php';
include_once '../database/BlogpostDB.php';

if (!isset($_SESSION['isadmin']) || $_SESSION['isadmin']==0) {
        $_SESSION['message'] = "ACCESS DENIED! You are not logged in or are not an admin.";
        $_SESSION['report_code'] = 'error';
        header('location: http://localhost/public_html//');
        exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if (isset($_POST['delete'])&&(isset($_POST['blogpostid']))){
        BlogpostDB::deletePostByID($_POST['blogpostid']);
        header("Location: http://localhost/public_html/manage/");
        exit;
    }
    if (isset($_POST['deleteCategory'])&&(isset($_POST['categoryid']))){
        CategoryDB::deleteCatByID($_POST['categoryid']);
        header("Location: http://localhost/public_html/manage/");
        exit;
    }
    if (isset($_POST['addCategory'])&&(isset($_POST['categoryName']))){
        $category = new Category("",$_POST['categoryName']);
        CategoryDB::insert($category);
        header("Location: http://localhost/public_html/manage/");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'C:\wamp64\www\public_html\templates\header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
</head>
<body>
<?php include 'C:\wamp64\www\public_html\templates\navbar.php'; ?>

<div class="container-fluid min-h-89 row ml-0">
    <main class="col-12 pt-3">
        <?php
        include 'C:\wamp64\www\public_html\templates\report.php';

        include 'C:\wamp64\www\public_html\manage\manage.php';
        ?>
    </main>
</div>
<?php
include 'C:\wamp64\www\public_html\templates\footer.php';
?>
</body>

</html>


