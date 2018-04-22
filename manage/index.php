<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once '../database/CategoryDB.php';
require_once '../database/BlogpostDB.php';

if (!isset($_SESSION['isadmin']) || $_SESSION['isadmin'] == 0) {
    $_SESSION['message'] = "ACCESS DENIED! You are not logged in or are not an admin.";
    $_SESSION['report_code'] = 'error';
    header('location: ../');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);
    if (isset($_POST['delete']) && (isset($_POST['blogpostid']))) {
        BlogpostDB::deletePostByID($_POST['blogpostid']);
        header("Location: ../manage/");
        exit;
    }
    if (isset($_POST['deleteCategory']) && (isset($_POST['categoryid']))) {
        CategoryDB::deleteCatByID($_POST['categoryid']);
        header("Location: ../manage/");
        exit;
    }
    if (isset($_POST['addCategory']) && (isset($_POST['categoryName']))) {
        $category = new Category("", $_POST['categoryName']);
        CategoryDB::insert($category);
        header("Location: ../manage/");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include '..\templates\header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
</head>
<body>
<?php include '..\templates\navbar.php'; ?>

<div class="container-fluid min-h-89 row ml-0">
    <main class="col-12 pt-3">
        <?php
        include '..\templates\report.php';
        ?>

        <div id="pageSwap">
            <?php
            include '..\manage\manage.php';
            ?>
        </div>
    </main>
</div>
<?php
include '..\templates\footer.php';
?>
</body>

</html>


