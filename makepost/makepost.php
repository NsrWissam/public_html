<div class="form container-fluid">
    <h2>Submit blog post</h2>
    <hr/>
    <form action="index.php" method="post" autocomplete="off" class="myForm">
        <table cellpadding="6em" class="mt-5">
            <tr class="">
                <td align="right"><label for="title">Title</label></td>
                <td align="left"><input class="w-100" id="title" name='title' type="text" required autocomplete="off"
                                        placeholder="Your Title"/></td>
            </tr>
            <tr class="">
                <td align="right"><label for="category">Category</label></td>
                <td align="left"><select id="category" name="category" class="pr-6 w-100">
                        <?php
                        $list = CategoryDB::getAll();
                        foreach ($list as $category) {
                            ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr class="">
                <td align="right"><label for="image">Image</label></td>
                <td align="left"><input class="w-100" name='image' id="image" type="url" required autocomplete="off"/>
                </td>
            </tr>
            <tr class="">
                <td class="align-text-top" style="vertical-align: top;"><label for="posttext">Post Text</label></td>
                <td align="left"><textarea name="posttext" id="posttext" cols="40" rows="10"
                                           placeholder="Type your blog text here..."></textarea></td>
            </tr>
            <tr class="">
                <td colspan="2">
                    <button name="submitPost" id="submitPost" type="submit" class="button button-block">
                        Submit Blog
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>


<div class="container-fluid">
    <div class="mt-5">
        <h2>Next Section title</h2>
    </div>


</div>