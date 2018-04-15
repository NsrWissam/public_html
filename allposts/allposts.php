<div class="container-fluid col-12">

    <h1>All Blog Posts</h1>
    <hr/>
    <div class="row">
        <?php

        $list = BlogpostDB::getAll();
        foreach ($list as $blogpost) {
            $author = UserDB::getByID($blogpost->author_id);
            $category = CategoryDB::getByID($blogpost->category_id);
            $noc = BlogpostDB::getNOCbyID($blogpost->id);
            ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 float-left p-4">
                <a class="col-12" href="#">
                    <img title="<?php echo $noc ?> comments" class="img-thumbnail rounded" height="auto" width="auto" src="<?php echo $blogpost->image; ?>"
                         alt="Blogpost image">
                </a>
                <br />
                <div class="media-body col-12">
                    <h4 class="media-heading"><?php echo $blogpost->title; ?></h4>
                    <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                    <p align="justify"><?php echo substr($blogpost->content, 0, 250) . "..."; ?></p>

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