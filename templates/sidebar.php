

<nav class="col-lg-2 col-xl-2 d-xl-block d-lg-block d-md-none d-sm-none d-none sidebar">
    <div id="MainMenu" class="text-center mb-4">

        <a href="#collapse1" class="navbar-text clg col-12" data-parent="#MainMenu" data-toggle="collapse">
            Categories
            <i class="fa fa-caret-down"></i></a>

        <div class="row">
            <div class="collapse text-center col-12" id="collapse1">
                <?php
                $list = CategoryDB::getAll();
                foreach ($list as $category) {
                    ?>

                    <a  onclick="showByCategoryID(<?php echo $category->id; ?>)" class="nav-link-sidebar" href="#"><?php echo $category->name; ?></a>

                <?php } ?>
            </div>
        </div>

        <a href="#collapse2" class="navbar-text mt-1 clg" data-parent="#MainMenu" data-toggle="collapse">Month
            Archive <i class="fa fa-caret-down"></i></a>
        <div class="row">
            <div class="collapse text-center col-12" id="collapse2">
                <a onclick="showByMonthName('January')"class="nav-link-sidebar" href="#">January</a>
                <a onclick="showByMonthName('February')" class="nav-link-sidebar" href="#">February</a>
                <a onclick="showByMonthName('March')" class="nav-link-sidebar" href="#">March</a>
                <a onclick="showByMonthName('April')" class="nav-link-sidebar" href="#">April</a>
                <a onclick="showByMonthName('May')" class="nav-link-sidebar" href="#">May</a>
                <a onclick="showByMonthName('June')" class="nav-link-sidebar" href="#">June</a>
                <a onclick="showByMonthName('July')" class="nav-link-sidebar" href="#">July</a>
                <a onclick="showByMonthName('August')" class="nav-link-sidebar" href="#">August</a>
                <a onclick="showByMonthName('September')" class="nav-link-sidebar" href="#">September</a>
                <a onclick="showByMonthName('October')" class="nav-link-sidebar" href="#">October</a>
                <a onclick="showByMonthName('November')" class="nav-link-sidebar" href="#">November</a>
                <a onclick="showByMonthName('December')" class="nav-link-sidebar" href="#">December</a>
            </div>
        </div>
    </div>

        <?php if ($currentTab == "allposts") {
    $list = BlogpostDB::getMostPopular();
    ?>
            <h5 class="text-center" style="color: lightgray">Popular Posts</h5>
            <?php
    foreach ($list as $blogpost) {
    $author = UserDB::getByID($blogpost->author_id);
    $category = CategoryDB::getByID($blogpost->category_id)
    ?><div onclick="showByBlogpostID(<?php echo $blogpost->id; ?>)" class="d-block">
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

</nav>