<?php
require_once '../database/CategoryDB.php';
require_once '../database/UserDB.php';
require_once '../database/CommentDB.php';
require_once '../database/BlogpostDB.php';

if (!isset($_SESSION)) {
    session_start();
}

$blogpost_id = intval($_GET['blogpost_id']);
$blogpost = BlogpostDB::getByID($blogpost_id);
//var_dump($blogpost);
$author = UserDB::getByID($blogpost->author_id);
$category = CategoryDB::getByID($blogpost->category_id);
$noc = BlogpostDB::getNOCbyID($blogpost->id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_com'])) {
        $comment = new Comment("", $_SESSION['user_id'], $_POST['content'],$_POST['blogpost_id'], $_POST['com_title'], "");
        CommentDB::insert($comment);
    }
}

?>
<div class="row">
    <div class="container col-sm-1 col-md-3 col-lg-3 text-center">
        ...
    </div>

    <div class="container col-sm-10 col-md-6 col-lg-6">

        <div class="col-12 p-2">
            <div class="card m-2" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                <img title="<?php echo $noc ?> comments" class="card-img-top"
                     src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>" width="50%">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $blogpost->title; ?></h2>
                    <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                    <p align="justify" class="card-text">
                        <?php echo $blogpost->content ?></p>
                    <div class="card-footer text-muted">
                            <span><i class="fa fa-calendar"
                                     aria-hidden="true"></i><?php echo date(" D, d-m-'y", strtotime($blogpost->postdate)); ?> </span>
                        | <?php echo $category->name; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- comment sectuib -->
        <div class="container col-12">
                <div class="page-header col-12">
                    <h1>
                        <small class="pull-right"><?php echo $noc ?> comments</small>
                        Comments
                    </h1>
                </div>
                <div class="comments-list col-12">
                    <?php
                    $com_list = CommentDB::getCommentsByBPID($blogpost_id);
                    foreach ($com_list as $comment) {
                        $com_author = UserDB::getByID($comment->author_id);
                        ?>
                        <!-- comment  -->
                        <hr/>
                        <div class="row">
                            <div class="media-body">
                                <h4 class="media-heading user_name"><?php echo $com_author->first_name . " " . $com_author->last_name; ?></h4>
                                <?php echo $comment->content; ?>
                            </div>
                            <p align="right"><small><?php echo date(" D, d-m-'y", strtotime($comment->date)); ?></small></p>
                        </div>
                        <!-- /comment -->
                        <?php
                    }
                    ?>
                    <hr />
                </div>
            </div>
        <!-- comment section -->
        <!-- place comment section -->
        <div class="widget-area no-padding blank mb-5">
            <div class="status-upload">
                <form action="../templates/detailpage.php" method="post">
        <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false): ?>
            <input hidden id="blogpost_id" name='blogpost_id' value="<?php echo $blogpost->id ?>" type="text" disabled/>
            <input class="m-3" readonly id="title" name='title' type="text" autocomplete="off"
                   placeholder="Your Title" disabled/><br />
            <textarea name="content"disabled placeholder="Log in first to place a comment!" ></textarea>
            <button disabled name="submit_com" type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Comment</button>
        <?php elseif ($_SESSION['logged_in'] == true): ?>
            <input hidden id="blogpost_id" name='blogpost_id' value="<?php echo $blogpost->id ?>" type="text"/>
            <input class="m-3" required id="com_title" name='com_title' type="text" autocomplete="off"
                   placeholder="Your Title"/>
            <textarea name="content" required placeholder="Write a comment here." ></textarea>
            <button name="submit_com" type="submit" class="btn btn-success green"><i class="fa fa-share"></i> Comment</button>
        <?php endif; ?>
                </form>
            </div><!-- Status Upload  -->
        </div><!-- Widget Area -->

    </div>

    <div class="container col-sm-1 col-md-3 col-lg-3 text-center">
        ...
    </div>

</div>

