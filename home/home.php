<div class="container-fluid col-12">

    <hr/>
    <h2 class="sub-title pb-4 pt-4">Most Popular Posts</h2>
    <hr/>

    <div class="row">

        <?php
        $listPop = BlogpostDB::getMostPopular();
        //var_dump($listPop);
        foreach ($listPop as $blogpost) {
            $author = UserDB::getByID($blogpost->author_id);
            $category = CategoryDB::getByID($blogpost->category_id);
            $noc = BlogpostDB::getNOCbyID($blogpost->id);
            ?>

            <div class="col-sm-12 col-md-6 col-lg-4 float-left p-4">
                <div class="card m-2 clickable" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                    <img title="<?php echo $noc ?> comments" class="card-img-top"
                         src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="pl-3 pr-0 col-sm-12 col-md-7 col-lg-7 col-xl-8">
                                <h4 align="left"><?php echo $blogpost->title; ?></h4>
                            </div>
                            <div class="pl-0 pr-3 col-sm-12 col-md-5 col-lg-5 col-xl-4">
                                <p align="right">By <?php echo
                                        strtoupper(substr($author->first_name, 0, 1))
                                        . substr($author->first_name, 1) . ", "
                                        . strtoupper(substr($author->last_name, 0, 1))
                                        . ".";
                                    ?>
                                </p>
                            </div>
                        </div>
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
                <div class="card m-2 clickable" onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)">
                    <img title="<?php echo $noc ?> comments" class="card-img-top"
                         src="<?php echo $blogpost->image; ?>" alt="<?php echo $blogpost->title; ?>">
                    <div class="card-body">
                        <div class="row">
                            <div class="pl-3 pr-0 col-sm-12 col-md-7 col-lg-7 col-xl-8">
                                <h4 align="left"><?php echo $blogpost->title; ?></h4>
                            </div>
                            <div class="pl-0 pr-3 col-sm-12 col-md-5 col-lg-5 col-xl-4">
                                <p align="right">
                                    By <?php echo strtoupper(substr($author->first_name, 0, 1)) . substr($author->first_name, 1) . ", " . strtoupper(substr($author->last_name, 0, 1)) . "."; ?></p>
                            </div>
                        </div>
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

        <?php } ?>

    </div>
</div>