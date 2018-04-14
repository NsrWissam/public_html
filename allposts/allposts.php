<div class="container-fluid">
    <h1>All blog posts</h1>
    <hr/>

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
            <td align="justify"><?php echo substr($blogpost->content, 0, 200)."..."; ?></td>
            <td><?php echo $category->name; ?></td>
            <td><?php echo $blogpost->postdate; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</div>


