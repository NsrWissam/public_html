<?php
require_once '../database/CategoryDB.php';
require_once '../database/UserDB.php';
require_once '../database/CommentDB.php';
require_once '../database/BlogpostDB.php';

$MonthName = strval($_GET['MonthName']);
$list = BlogpostDB::getPostsByMonth($MonthName);
//var_dump($list);
?>

<div class="container-fluid col-12">

    <h1>All Blog Posts</h1>
    <hr/>
    <div class="row">
        <?php
        foreach ($list as $blogpost) {
            $author = UserDB::getByID($blogpost->author_id);
            $category = CategoryDB::getByID($blogpost->category_id);
            $noc = BlogpostDB::getNOCbyID($blogpost->id);
            ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 float-left p-2">
                <div class="card m-2" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                    <img title="<?php echo $noc ?> comments" class="card-img-top"
                         src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $blogpost->title; ?></h2>
                        <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                        <p align="justify" class="card-text">
                            <?php echo substr($blogpost->content, 0, 250) . "..."; ?></p>
                        <div class="card-footer text-muted">
                            <span><i class="fa fa-calendar"
                                     aria-hidden="true"></i><?php echo date(" D, d-m-'y", strtotime($blogpost->postdate)); ?> </span>
                            | <?php echo $category->name; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>