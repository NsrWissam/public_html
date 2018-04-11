<?php

class Database{
    protected $host;
    protected $user;
    protected $pass;
    protected $db;
    protected $connection = null;

    public function __construct($host,$user,$pass,$db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function __destruct(){
        if ($this->connection != null)
            $this->closeConnection();
    }

    protected function makeConnection(){
        //connectie maken met database
       $this->connection = new mysqli($this->host, $this->user, $this->pass,$this->db);
       if ($this->connection->connect_error){
           echo "FAIL:".$this->connection->connect_error;
       }
    }

    protected function closeConnection(){
        //connectie sluiten met database
        if($this->connection != null){
            $this->connection->close();
            $this->connection = null;
        }
    }

    protected function cleanParameters($p){
        //prevent SQL injection
        $result = $this->connection->real_escape_string($p);
        return $result;
    }

    public function executeQuery($query, $params = null){
//        Is there a DB connection?
            $this->makeConnection();
//        Adjust query with params if available
        if ($params != null) {
//            Change ? to values from parameter Array
            $queryParts = preg_split("/\?/", $query);
//            If amount of ? is not equel to amount of values => error!
            if (count($queryParts) != count($params) + 1) {
                return false;
            }
//            Add first part
            $finalQuery = $queryParts[0];
//            loop over all parameters
            for ($i = 0; $i < count($params); $i++) {
//                add clean parameter to query
                $finalQuery = $finalQuery . $this->cleanParameters($params[$i]) . $queryParts[$i + 1];
            }
            $query = $finalQuery;
        }
//        execute query
        $results = $this->connection->query($query);

        return $results;
    }



}
