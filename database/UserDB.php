<?php
include_once "../data/User.php";
include_once "DatabaseFactory.php";
//CRUD methods for User objects

class UserDB{

    private static function getConnection(){
        return DatabaseFactory::getDatabase();
    }

    public static function getAll(){
//        Execute query
        $results = self::getConnection()->executeQuery("SELECT * FROM user");
//        Prepare array to return to frontend
        $resultsArray = array();
        for($i = 0; $i < $results->num_rows; $i++ ){
            //Retrieves the current selected row
            $row = $results->fetch_array();
            //Make a user
            $user = self::convertRowToObject($row);
            //add user to result array
            $resultsArray[$i] = $user;
        }
        return $resultsArray;
    }

    public static function getByID($id){
        $results = self::getConnection()->executeQuery("SELECT * FROM user where id= $id");
        $row = $results->fetch_array();
        //Make a book
        $user = self::convertRowToObject($row);

        return $user;
    }

    public static function insert($user){
        return self::getConnection()->executeQuery(
            "INSERT INTO user(first_name, last_name, email, password, hash, active, isadmin)VALUES ('?','?','?','?','?','?','?');"
            ,array($user->first_name,
                $user->last_name,$user->email,$user->password,
                $user->hash,$user->active, $user->isadmin));
    }

    public static function convertRowToObject($row){
        return new User(
            $row['id'],
            $row['first_name'],
            $row['last_name'],
            $row['email'],
            $row['password'],
            $row['hash'],
            $row['active'],
            $row['isadmin']);
    }

    public static function login($email, $password){
        if(!empty($email)&&!empty($password)){
           $result = self::getConnection()->executeQuery("SELECT * FROM user WHERE email='$email'");
            if ( $result->num_rows == 0 ){ // User doesn't exist
                $_SESSION['message'] = "User with that email doesn't exist!";
                $_SESSION['report_code']='error';
                header("location: http://localhost/public_html/");
                exit;
            }
            else { // User exists
                $user = $result->fetch_assoc();

                //var_dump($user);
                if ( password_verify($_POST['password'], $user['password']) ) {
//                  Save user data when logged in to use on other pages
                    $_SESSION['user_id']=$user['id'];
                    //var_dump($_SESSION['user_id']);
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['active'] = $user['active'];

//                  This is how we'll know the user is logged in
                    $_SESSION['logged_in'] = true;

                    header("location: http://localhost/public_html/");
                    exit;
                }
                else {
                    $_SESSION['message'] = "You have entered wrong password, try again!";
                    $_SESSION['report_code']='error';
                    header("location: http://localhost/public_html/");
                    exit;
                }
            }
        }
        else
        {
            die("Data not recieved");
        }
    }

    public static function register($user){
//          Set session variables to be used in other pages
        $_SESSION['email'] = $user->email;
        $_SESSION['first_name'] = $user->first_name;
        $_SESSION['last_name'] = $user->last_name;

//          Set all generated content of new user object

        $password = password_hash($user->password, PASSWORD_BCRYPT);
        $user->password=$password;
        $hash = md5( rand(0,1000) );
        $user->hash = $hash;
        $active = 1;
        $user->active = $active;
        $isadmin = 0;
        $user->isadmin = $isadmin;

//          Check if user with that email already exists
        $result = self::getConnection()->executeQuery("SELECT * FROM user WHERE email='$user->email'");

//          We know user email exists if the rows returned are more than 0
        if ( $result->num_rows > 0 ) {

            $_SESSION['message'] = 'User with this email already exists!';
            $_SESSION['report_code']='error';
            header("location: http://localhost/public_html/registration/");
            exit;
        }
        else {  // Email doesn't already exist in a database, proceed...
                // Add user to the database
            if (self::insert($user)){
                $obj = self::getConnection()->executeQuery("SELECT id FROM user WHERE email='$user->email'");

                $inserteduserid = $obj->fetch_assoc();

                $_SESSION['user_id'] = $inserteduserid['id'];
                $_SESSION['active'] = 1; //1 by default
                $_SESSION['logged_in'] = true; // So we know the user has logged in
                $_SESSION['message'] = "Account was successfully created!";
                $_SESSION['report_code']="success";
                header("location: http://localhost/public_html/");
                exit;
            }

            else {
                $_SESSION['message'] = 'Registration failed!';
                $_SESSION['report_code']='error';
                header("location: http://localhost/public_html/registration/");
                exit;
            }

        }

    }
}
?>