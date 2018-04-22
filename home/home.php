<div class="container-fluid col-12">

    <hr/>
    <h2 class="sub-title pb-4 pt-4">Most Popular Posts</h2>
    <hr/>

    <div class="flex-row d-flex">

        <?php
        $listPop = BlogpostDB::getMostPopular();
        //var_dump($listPop);
        foreach ($listPop as $blogpost) {
            $author = UserDB::getByID($blogpost->author_id);
            $category = CategoryDB::getByID($blogpost->category_id);
            $noc = BlogpostDB::getNOCbyID($blogpost->id);
            ?>

            <div class="col-sm-12 col-md-6 col-lg-4 float-left p-4">
                <div class="card m-2" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                    <img title="<?php echo $noc ?> comments" class="card-img-top"
                         src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $blogpost->title; ?></h2>
                        <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                        <p align="justify" class="card-text">
                            <?php echo substr($blogpost->content, 0, 400) . "..."; ?></p>
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
<div class="container-fluid col-12 pb-5">

    <hr/>
    <h2 class="sub-title pb-4 pt-4"><?php echo date("F") ?>'s Posts</h2>
    <hr/>

    <div class="row">

        <?php
        $listRand = BlogpostDB::getRandom();
        //var_dump($listRand);
        foreach ($listRand as $blogpost) {
            $author = UserDB::getByID($blogpost->author_id);
            $category = CategoryDB::getByID($blogpost->category_id);
            $noc = BlogpostDB::getNOCbyID($blogpost->id); ?>

            <div class="col-sm-12 col-md-6 col-lg-4 float-left p-4">
                <div class="card m-2" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                    <img title="<?php echo $noc ?> comments" class="card-img-top" height="auto" width="100%"
                         src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $blogpost->title; ?></h2>
                        <p class="text-right">By <?php echo $author->first_name . "," . $author->last_name ?></p>
                        <p align="card-text">
                            <?php echo substr($blogpost->content, 0, 400) . "..."; ?></p>
                        <div class="card-footer text-muted">
                            <span><i class="fa fa-calendar"
                                     aria-hidden="true"></i><?php echo date(" D, d-m-'y", strtotime($blogpost->postdate)); ?> </span>
                            | <?php echo $category->name; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

    </div>
</div>