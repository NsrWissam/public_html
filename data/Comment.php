<?php
class Comment{
    public $id;
    public $author_id;
    public $content;
    public $blogpost_id;
    public $title;
    public $date;

    /**
     * Comment constructor.
     * @param $id
     * @param $author_id
     * @param $content
     * @param $blogpost_id
     * @param $title
     * @param $date
     */
    public function __construct($id, $author_id, $content, $blogpost_id, $title, $date)
    {
        $this->id = $id;
        $this->author_id = $author_id;
        $this->content = $content;
        $this->blogpost_id = $blogpost_id;
        $this->title = $title;
        $this->date = $date;
    }

    //Extra functionality can be written here
}
?>