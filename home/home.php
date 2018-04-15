<div class="container-fluid col-12">

    <h1>Welcome to my blog!</h1>
    <hr/>

    <h2 class="sub-title pb-4 pt-4">Most Popular Posts</h2>
<div class="row">
    <?php

    $list = BlogpostDB::getMostPopular();
    foreach ($list as $blogpost) {
        $author = UserDB::getByID($blogpost->author_id);
        $category = CategoryDB::getByID($blogpost->category_id);
        $noc = BlogpostDB::getNOCbyID($blogpost->id);
        ?>
                <div class="col-sm-12 col-md-6 col-lg-4 float-left p-4">
                    <a class="col-12" href="#">
                        <img title="<?php echo $noc ?> comments" class="img-thumbnail rounded" height="auto" width="100%" src="<?php echo $blogpost->image; ?>"
                             alt="Blogpost image">
                    </a>
                    <br />
                    <div class="media-body col-12">
                        <h4 class="media-heading"><?php echo $blogpost->title; ?></h4>
                        <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                        <p align="justify"><?php echo substr($blogpost->content, 0, 400) . "..."; ?></p>

                        <span><i class="fa fa-calendar"
                                 aria-hidden="true"></i><?php echo date(" D, d-m-'y",strtotime($blogpost->postdate)); ?> </span>
                        | <?php echo $category->name; ?>
                    </div>
                </div>
        <?php
    }
    ?>
</div>
</div>
<div class="container-fluid col-12 pb-5">
    <h2 class="sub-title pb-4 pt-4"><?php echo date("F") ?>'s Posts</h2>
<div class="row">
    <?php
    $list = BlogpostDB::getRandom();
    foreach ($list as $blogpost) {
        $author = UserDB::getByID($blogpost->author_id);
        $category = CategoryDB::getByID($blogpost->category_id);
        $noc = BlogpostDB::getNOCbyID($blogpost->id);
        ?>
        <div class="col-sm-12 col-md-6 col-lg-4 float-left">
            <a class="col-12" href="#">
                <img title="<?php echo $noc ?> comments" class="img-thumbnail rounded" height="auto" width="100%" src="<?php echo $blogpost->image; ?>"
                     alt="Blogpost image">
            </a>
            <br />
            <div class="media-body col-12">
                <h4 class="media-heading"><?php echo $blogpost->title; ?></h4>
                <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                <p align="justify"><?php echo substr($blogpost->content, 0, 400) . "..."; ?></p>

                <span><i class="fa fa-calendar"
                         aria-hidden="true"></i><?php echo date(" D, d-m-'y",strtotime($blogpost->postdate)); ?> </span>
                | <?php echo $category->name; ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>

</div>