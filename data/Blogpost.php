<?php
class Blogpost{
    public $id;
    public $title;
    public $author_id;
    public $content;
    public $image;
    public $category_id;
    public $postdate;

    /**
     * Blogpost constructor.
     * @param $id
     * @param $title
     * @param $author_id
     * @param $content
     * @param $image
     * @param $category_id
     * @param $postdate
     */
    public function __construct($id, $title, $author_id, $content, $image, $category_id, $postdate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author_id = $author_id;
        $this->content = $content;
        $this->image = $image;
        $this->category_id = $category_id;
        $this->postdate = $postdate;
    }

    //Extra functionality can be written here
}
?>