<div class="container-fluid">

    <h1>My Blog</h1>
    <hr/>

    <h2 class="sub-title pb-4 pt-4">Most Popular Posts</h2>

    <?php
    $list = BlogpostDB::getMostPopular();
    foreach ($list as $blogpost) {
        $author = UserDB::getByID($blogpost->author_id);
        $category = CategoryDB::getByID($blogpost->category_id)
        ?>
        <div class="pb-5">
                <div class="media">
                    <a class="pull-left pr-2" href="#">
                        <img class="media-object img-thumbnail rounded" src="<?php echo $blogpost->image; ?>"
                             alt="Blogpost image" height="300px" width="300px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $blogpost->title; ?></h4>
                        <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                        <p align="justify"><?php echo substr($blogpost->content, 0, 500) . "..."; ?></p>

                        <span><i class="fa fa-calendar"
                                 aria-hidden="true"></i> <?php echo $blogpost->postdate; ?> </span>
                        | <?php echo $category->name; ?>
                    </div>
                </div>
        </div>
        <?php
    }
    ?>
</div>
<div class="container-fluid">
    <h2 class="sub-title pb-4 pt-4"><?php echo date("F") ?>'s Posts</h2>

    <?php
    $list = BlogpostDB::getRandom();
    foreach ($list as $blogpost) {
        $author = UserDB::getByID($blogpost->author_id);
        $category = CategoryDB::getByID($blogpost->category_id)
        ?>
        <div class="pb-5">
                <div class="media">
                    <a class="pull-left pr-2" href="#">
                        <img class="media-object img-thumbnail rounded" src="<?php echo $blogpost->image; ?>"
                             alt="Blogpost image" height="300px" width="300px">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $blogpost->title; ?></h4>
                        <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                        <p align="justify"><?php echo substr($blogpost->content, 0, 500) . "..."; ?></p>

                        <span><i class="fa fa-calendar"
                                 aria-hidden="true"></i> <?php echo $blogpost->postdate; ?> </span>
                        | <?php echo $category->name; ?>
                    </div>
                </div>
        </div>
        <?php
    }
    ?>


</div>