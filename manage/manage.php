<div class="container-fluid col-12">
    <h2 class="sub-title pb-4 pt-4">Manage categories</h2>
    <div class="row ml-2 mr-2 mb-5 mt-3">

        <div class="row col-lg-4 col-md-5 col-sm-5 text-center">
            <div class="row">
                <form class="mt-3 text-center" action="index.php" method="post" autocomplete="off">
                    <div class="row col-12">
                        <div class="col-4">
                            <p>Category:</p>
                        </div>
                        <div class="col-8">
                            <input name="categoryName" id="categoryName" value="" class="form-control" type="text" placeholder="Category">
                        </div>
                        <button id="addCategory" name="addCategory" class="btn-secondary btn-block mt-3"
                                type="submit">
                            Add Category!
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-4 col-md-5 col-sm-4 text-center">
            ...
        </div>

        <div class="col-lg-4 col-md-2 col-sm-3 text-center">
            <table class="table-striped align-items-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Delete?</th>
                </tr>
                </thead>

                <?php
                include_once '../database/CategoryDB.php';
                $list = CategoryDB::getAll();
                foreach ($list as $category) {
                    ?>
                    <tr>
                        <td><?php echo $category->id; ?></td>
                        <td><?php echo $category->name; ?></td>
                        <td>
                            <form action="http://localhost/public_html/manage/"
                                  class="form" role="form" method="post">
                                <input hidden name="categoryid" id="categoryid" type="text" autocomplete="off" value="<?php echo $category->id ?>" />
                                <button id="deleteCategory" name="deleteCategory" class="btn-secondary btn-block mt-3" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

</div>


<div class="container-fluid col-12 pb-5">

    <h1>Manage Page</h1>
    <hr/>

    <h2 class="sub-title pb-4 pt-4">Manage all posts</h2>
    <div class="row">

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Content</th>
                <th scope="col">Category</th>
                <th scope="col">Post date</th>
                <th scope="col">Delete?</th>
            </tr>
            </thead>

            <?php
            include_once '../database/BlogpostDB.php';
            $list = BlogpostDB::getAll();
            foreach ($list as $blogpost) {
                $author = UserDB::getByID($blogpost->author_id);
                $category = CategoryDB::getByID($blogpost->category_id);
                ?>
                <tr>
                    <td><?php echo $blogpost->id; ?></td>
                    <td><?php echo $blogpost->title; ?></td>
                    <td><?php echo $author->first_name . "," . $author->last_name; ?></td>
                    <td><?php echo substr($blogpost->content, 0, 50) . "..."; ?></td>
                    <td><?php echo $category->name; ?></td>
                    <td><?php echo date(" D, d-m-'y",strtotime($blogpost->postdate)); ?></td>
                    <td>
                        <form action="http://localhost/public_html/manage/"
                              class="form" role="form" method="post">
                        <input hidden name="blogpostid" id="blogpostid" type="text" autocomplete="off" value="<?php echo $blogpost->id ?>" />
                        <button id="delete" name="delete" class="btn-secondary btn-block mt-3" type="submit">
                            Delete
                        </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <a href="../makepost/">Insert a Post</a>
    </div>
</div>