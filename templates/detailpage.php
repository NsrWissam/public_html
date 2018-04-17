<?php
include_once '../database/BlogpostDB.php';
include_once '../database/CategoryDB.php';
include_once '../database/UserDB.php';
include_once '../database/CommentDB.php';

$blogpost_id = intval($_GET['blogpost_id']);
$blogpost = BlogpostDB::getByID($blogpost_id);
//var_dump($blogpost);
$author = UserDB::getByID($blogpost->author_id);
$category = CategoryDB::getByID($blogpost->category_id);
$noc = BlogpostDB::getNOCbyID($blogpost->id);
?>
<div class="row">
<div class="container col-sm-1 col-md-3 col-lg-4 text-center">
    ...
</div>

<div class="container col-sm-10 col-md-6 col-lg-4">
    <div class="row">
        <div class="col-12 p-2">
            <div class="card m-2" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                <img title="<?php echo $noc ?> comments" class="card-img-top"
                     src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>" width="50%">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $blogpost->title; ?></h2>
                    <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                    <p align="card-text">
                        <?php echo $blogpost->content ?></p>
                    <div class="card-footer text-muted">
                            <span><i class="fa fa-calendar"
                                     aria-hidden="true"></i><?php echo date(" D, d-m-'y", strtotime($blogpost->postdate)); ?> </span>
                        | <?php echo $category->name; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container col-sm-1 col-md-3 col-lg-4 text-center">
    ...
</div>

</div>
