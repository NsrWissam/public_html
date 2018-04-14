<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
    <div id="MainMenu">

        <?php if ($currentTab == "allposts") {
            $list = BlogpostDB::getMostPopular();
            foreach ($list as $blogpost) {
                $author = UserDB::getByID($blogpost->author_id);
                $category = CategoryDB::getByID($blogpost->category_id)
                ?>
                    <div class="row pt-2">
                        <a href="#">
                            <img class="media-object rounded" src="<?php echo $blogpost->image; ?>"
                                 alt="Blogpost image" height="100px" width="150px">
                        </a>
                    </div>
                    <div class="row">
                        <div class="media-body">
                            <h6 class="media-heading"><?php echo $blogpost->title; ?></h6>
                            <small><p>By <?php echo $author->first_name . "," . $author->last_name ?><span style="float:right;"><small><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date("D, d/m/'y", strtotime($blogpost->postdate)); ?> </span>
                            | <?php echo $category->name; ?></small> </span></p></small>
                            <small><p align="justify"><?php echo substr($blogpost->content, 0, 100) . "..."; ?></p></small>
                        </div>
                    </div>
                <?php
            }
        }
        ?>


        <a href="#collapse1" class="navbar-text mb-0 mt-1 clg" data-parent="#MainMenu" data-toggle="collapse">Categories
            <i class="fa fa-caret-down"></i></a>
        <div class="row">
            <div class="collapse" id="collapse1">
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
            <div class="collapse" id="collapse2">
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