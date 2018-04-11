<?php
class User{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $hash;
    public $active;
    public $isadmin;

    /**
     * User constructor.
     * @param $id
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $password
     * @param $hash
     * @param $active
     * @param $isadmin
     */
    public function __construct($id, $first_name, $last_name, $email, $password, $hash, $active, $isadmin)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->hash = $hash;
        $this->active = $active;
        $this->isadmin = $isadmin;
    }

    //Extra functionality can be written here
}
?>