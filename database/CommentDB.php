<?php
include_once "../data/Comment.php";
include_once "DatabaseFactory.php";
if (!isset($_SESSION)) {
    session_start();
}
class CommentDB {

    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }

    public static function getAll(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM comment");
//        Prepare array to return to frontend
        $resultsArray = array();
        for($i = 0; $i < $results->num_rows; $i++ ){
            //Retrieves the current selected row
            $row = $results->fetch_array();
            //Make a book
            $comment = self::convertRowToObject($row);
            //add book to result array
            $resultsArray[$i] = $comment;
        }
        return $resultsArray;
    }

    public static function insert($comment){
        return self::getConnection(content, title)->executeQuery("INSERT INTO comment(content,title) VALUES ('?','?')",
            array($comment->content,$comment->title));
    }

    public static function convertRowToObject($row){
        return new Comment(
            $row['id'],
            $row['author_id'],
            $row['content'],
            $row['blogpost_id'],
            $row['title'],
            $row['date']);
    }

    public static function getCommentsByBPID($blogpost_id){

        $results = self::getConnection()->executeQuery("SELECT * FROM comment where blogpost_id=$blogpost_id");
        $resultsArray = array();

        for($i = 0; $i < $results->num_rows; $i++ ){

            $row = $results->fetch_array();

            $blogpost = self::convertRowToObject($row);

            $resultsArray[$i] = $blogpost;
        }
        return $resultsArray;
    }

}
?>