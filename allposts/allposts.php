<div class="container-fluid">
    <h1>All blog posts</h1>
    <hr/>

    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200"
                 class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <div class="text-muted">Something else</div>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200"
                 class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200"
                 class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>
        <div class="col-6 col-sm-3 placeholder">
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200"
                 class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
            <h4>Label</h4>
            <span class="text-muted">Something else</span>
        </div>
    </section>
</div>


<div class="container-fluid">
    <div class="mt-5 mb-2">
        <h2>Overview</h2>
    </div>
    <table>
        <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Image</td>
            <td>Content</td>
            <td>Category</td>
            <td>Post date</td>
        </tr>
        <?php
        $list = BlogpostDB::getAll();
        foreach ($list as $blogpost) {
            $author = UserDB::getByID($blogpost->author_id);
            $category = CategoryDB::getByID($blogpost->category_id)
            ?>
            <tr>
                <td><?php echo $blogpost->title; ?></td>
                <td><?php echo $author->first_name . " " . $author->last_name ?></td>
                <td><?php echo $blogpost->image; ?></td>
                <td><?php echo $blogpost->content; ?></td>
                <td><?php echo $category->name; ?></td>
                <td><?php echo $blogpost->postdate; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>