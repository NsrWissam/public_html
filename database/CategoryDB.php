<?php
include_once "../data/Category.php";
include_once "DatabaseFactory.php";
if(!isset($_SESSION)) {
    session_start();
}
class CategoryDB
{

    private static function getConnection()
    {
        return DatabaseFactory::getDatabase();
    }

    public static function getAll()
    {
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM category");
//        Prepare array to return to frontend
        $resultsArray = array();
        for ($i = 0; $i < $results->num_rows; $i++) {
            //Retrieves the current selected row
            $row = $results->fetch_array();
            //Make a book
            $category = self::convertRowToObject($row);
            //add book to result array
            $resultsArray[$i] = $category;
        }
        return $resultsArray;
    }

    public static function getByID($id)
    {
        $results = self::getConnection()->executeQuery("SELECT * FROM category where id= $id");

        $row = $results->fetch_array();
        $category = self::convertRowToObject($row);

        return $category;
    }

    public static function insert($category){
        return self::getConnection(name)->executeQuery("INSERT INTO category(name) VALUES ('?')",
            array($category->name));
    }

    public static function convertRowToObject($row)
    {
        return new Category(
            $row['id'],
            $row['name']);
    }

}

?>