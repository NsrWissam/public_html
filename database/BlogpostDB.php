<?php
include_once "../data/Blogpost.php";
include_once "DatabaseFactory.php";

//zie "UserDB.php" voor commentaar en hier onder voor uniek commentaar

class BlogpostDB {

    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }

    public static function getAll(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM blogpost");
//        Prepare array to return to frontend
        $resultsArray = array();
        for($i = 0; $i < $results->num_rows; $i++ ){
            //Retrieves the current selected row
            $row = $results->fetch_array();
            //Make a book
            $blogpost = self::convertRowToObject($row);
            //add book to result array
            $resultsArray[$i] = $blogpost;
        }
        return $resultsArray;
    }

    public static function getByID($id){
        $results = self::getConnection()->executeQuery("SELECT * FROM blogpost where id= $id");

            $row = $results->fetch_array();
            //Make a book
            $blogpost = self::convertRowToObject($row);

        return $blogpost;
    }

    public static function insert($blogpost){
        var_dump($blogpost);
        $query = "INSERT INTO blogpost(title,author_id,content,image,category_id) VALUES ('?','?','?','?','?');";
        return self::getConnection()->executeQuery( $query ,array($blogpost->title,$blogpost->author_id,
                $blogpost->content,$blogpost->image,
                $blogpost->category_id ));//$blogpost->postdate
    }

    public static function convertRowToObject($row){
        return new Blogpost(
            $row['id'],
            $row['title'],
            $row['author_id'],
            $row['content'],
            $row['image'],
            $row['category_id'],
            $row['postdate']);
    }

    public static function makePost($blogpost){
//           Set all generated content of new blogpost object
        if(!isset($_SESSION['user_id'])){
           session_start();
        }
        $author_id = $_SESSION['user_id'];
        $blogpost->author_id=$author_id;
        //$postdate = date("d/m/Y");
        //$blogpost->postdate=$postdate;

//          Check if blogpost with that title already exists
        $result = self::getConnection()->executeQuery("SELECT * FROM blogpost WHERE title='$blogpost->title'");

//          We know blogpost title exists if the rows returned are more than 0
        if ( $result->num_rows > 0 ) {

            $_SESSION['message'] = 'Blogpost with this title already exists! try again.';
            $_SESSION['report_code']='error';
            header("location: http://localhost/public_html/makepost/");
            exit;
        }
        else { // Blogpost title doesn't already exist in the database, proceed...
//            Add blohpost to the database
            var_dump($blogpost);
            if (self::insert($blogpost)){
                $_SESSION['message'] = "Blogpost *<strong>$blogpost->title</strong>* was successfully submitted!";
                $_SESSION['report_code']="success";
                header("location: http://localhost/public_html/");
                exit;
            }
            else {
                $_SESSION['message'] = 'Blogpost insert operation failed!';
                $_SESSION['report_code']='error';

                header("location: http://localhost/public_html/makepost/");
                exit;
            }
        }
    }
}
?>