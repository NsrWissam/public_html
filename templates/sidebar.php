<nav class="col-lg-2 col-xl-2 d-xl-block d-lg-block d-md-none d-sm-none d-none sidebar">
    <div id="MainMenu" class="text-center">

        <?php if ($currentTab == "allposts") {
            $list = BlogpostDB::getMostPopular();
            ?>
            <h5 class="text-center" style="color: lightgray">Popular Posts</h5>
            <?php
            foreach ($list as $blogpost) {
                $author = UserDB::getByID($blogpost->author_id);
                $category = CategoryDB::getByID($blogpost->category_id)
                ?><div class="d-block">
                    <div class="col-12 float-left pt-2">
                        <a href="#">
                            <img class="media-object rounded" src="<?php echo $blogpost->image; ?>"
                                 alt="Blogpost image" height="auto" width="90%" style="max-width: 250px;">
                        </a>
                    </div>
                    <div class="col-12">
                        <div class="media-body">
                            <h6 class="media-heading mt-1" style="text-decoration: underline;"><?php echo $blogpost->title; ?></h6>
                            <small>
                                <p style="font-size: 90%;">
                                    <span style="float: left;">
                                        By <?php echo $author->first_name . "," . $author->last_name ?>
                                    </span>
                                    <span style="float:right;">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo date("D, d/m/'y", strtotime($blogpost->postdate)); ?> | <?php echo $category->name; ?>
                                    </span>
                                </p>
                            </small>
                            <small class="col-12"><p align="justify"><?php echo substr($blogpost->content, 0, 100) . "..."; ?></p></small>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>


        <a href="#collapse1" class="navbar-text mb-0 mt-1 clg col-12" data-parent="#MainMenu" data-toggle="collapse">Categories
            <i class="fa fa-caret-down"></i></a>
        <div class="row">
            <div class="collapse text-center col-12" id="collapse1">
                <a class="nav-link-sidebar" href="#">Travel</a>
                <a class="nav-link-sidebar" href="#">Technology</a>
                <a class="nav-link-sidebar" href="#">Photography</a>
                <a class="nav-link-sidebar" href="#">Architecture</a>
                <a class="nav-link-sidebar" href="#">Rave Culture</a>
            </div>
        </div>

        <a href="#collapse2" class="navbar-text mb-0 mt-3 clg" data-parent="#MainMenu" data-toggle="collapse">Month
            Archive <i class="fa fa-caret-down"></i></a>
        <div class="row">
            <div class="collapse text-center col-12" id="collapse2">
                <a class="nav-link-sidebar" href="#">January</a>
                <a class="nav-link-sidebar" href="#">February</a>
                <a class="nav-link-sidebar" href="#">March</a>
                <a class="nav-link-sidebar" href="#">April</a>
                <a class="nav-link-sidebar" href="#">May</a>
                <a class="nav-link-sidebar" href="#">June</a>
                <a class="nav-link-sidebar" href="#">July</a>
                <a class="nav-link-sidebar" href="#">August</a>
                <a class="nav-link-sidebar" href="#">September</a>
                <a class="nav-link-sidebar" href="#">October</a>
                <a class="nav-link-sidebar" href="#">November</a>
                <a class="nav-link-sidebar" href="#">December</a>
            </div>
        </div>
    </div>
</nav>