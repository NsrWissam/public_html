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
$_SESSION['cur_blogpost'] = $blogpost_id;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_com'])) {
        $comment = new Comment("", $_SESSION['user_id'], $_POST['content'], $_SESSION['cur_blogpost'], $_POST['com_title'], "");
        CommentDB::insert($comment);
    }
}
?>
<div class="row">
    <div class="container col-sm-1 col-md-3 col-lg-3 text-center"></div>

    <div class="container col-sm-10 col-md-6 col-lg-6">

        <div class="col-12 p-2">
            <div class="card m-2" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                <img title="<?php echo $noc ?> comments" class="card-img-top"
                     src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>" width="50%">
                <div class="card-body">
                    <div class="row">
                        <div class="pl-3 pr-0 col-7">
                            <h4 align="left"><?php echo $blogpost->title; ?></h4>
                        </div>
                        <div class="pl-0 pr-3 col-5">
                            <p align="right">By <?php echo strtoupper(substr($author->first_name, 0, 1)).substr($author->first_name, 1) . " " . strtoupper(substr($author->last_name, 0,1)).substr($author->last_name, 1); ?></p>
                        </div>
                    </div>
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
        <!-- comment sectuin -->
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
                            <h4 class="media-heading user_name"><?php echo $com_author->first_name . " " . $com_author->last_name; ?> - <?php echo $comment->title?></h4>
                            <?php echo $comment->content; ?>
                        </div>

                        <p align="right">
                            <small><?php echo date("D, d-m-'y  G:i", strtotime($comment->date)); ?></small>
                        </p>
                    </div>
                    <!-- /comment -->
                    <?php
                }
                ?>
                <hr/>
            </div>
        </div>
        <!-- comment section -->
        <!-- place comment section -->
        <div class="widget-area no-padding blank mb-5">
            <div class="status-upload">
                <form action="../detailpage/index.php?blogpost_id=<?php echo $blogpost_id ?>" method="post">
                    <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false): ?>
                        <input class="m-3" readonly id="title" name='title' type="text" autocomplete="off"
                               placeholder="Comment Title" disabled/><br/>
                        <textarea name="content" disabled placeholder="Log in first to place a comment!"></textarea>
                        <button disabled name="submit_com" type="submit" class="btn btn-success green"><i
                                    class="fa fa-share"></i> Comment
                        </button>
                    <?php elseif ($_SESSION['logged_in'] == true): ?>
                        <input class="m-3" required id="com_title" name='com_title' type="text" autocomplete="off"
                               placeholder="Comment Title"/>
                        <textarea name="content" required placeholder="Write a comment here."></textarea>
                        <button name="submit_com" type="submit" class="btn btn-success green"><i
                                    class="fa fa-share"></i> Comment
                        </button>
                    <?php endif; ?>


                </form>
            </div><!-- Status Upload  -->
        </div>
        <!-- place comment section -->
    </div>

    <div class="container col-sm-1 col-md-3 col-lg-3 text-center"></div>
</div>


<h2 class="sub-title pb-4 pt-4">Posts from same category</h2>
<div class="row ml-3">
    <?php
    $samecat_list = BlogpostDB::getSameCat($blogpost);
    //var_dump($samecat_list);
    foreach ($samecat_list as $element) {
        $el_author = UserDB::getByID($element->author_id);
        $el_category = CategoryDB::getByID($element->category_id);
        $el_noc = BlogpostDB::getNOCbyID($element->id);
        ?>
        <div class="col-sm-12 col-md-4 col-lg-4 float-left p-4">
            <div class="card m-2 clickable" onclick="showByBlogpostID(<?php echo $element->id; ?>)">
                <img title="<?php echo $el_noc ?> comments" class="card-img-top"
                     src="<?php echo $element->image; ?>" alt="<?php echo $element->title; ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="pl-3 pr-0 col-sm-12 col-md-7 col-lg-7 col-xl-8">
                            <h4 align="left"><?php echo $element->title; ?></h4>
                        </div>
                        <div class="pl-0 pr-3 col-sm-12 col-md-5 col-lg-5 col-xl-4">
                            <p align="right">By <?php echo strtoupper(substr($author->first_name, 0, 1)).substr($author->first_name, 1) . " " . strtoupper(substr($author->last_name, 0, 1)) . "."; ?></p>
                        </div>
                    </div>
                    <p align="justify" class="card-text">
                        <?php echo substr($element->content, 0, 100) . "..."; ?></p>
                    <div class="card-footer text-muted">
                            <span><i class="fa fa-calendar"
                                     aria-hidden="true"></i><?php echo date("D, d-m-'y", strtotime($element->postdate)); ?> </span>
                        | <?php echo $el_category->name; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

