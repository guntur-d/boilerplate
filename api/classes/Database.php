<?php
class Database
{

     

    // CHANGE THE DB INFO ACCORDING TO YOUR DATABASE CONFIGURATION
    private $db_host = "remotemysql.com:3306";
    private $db_name = 'mLLrkupzOI';
    private $db_username = 'mLLrkupzOI';
    private $db_password = 'ROeAsocsD9'; //if password is available for your MySQL db specify here

    public function dbConnection()
    {

        $conn = new mysqli($this->db_host, $this->db_username, $this->db_password, $this->db_name);

        if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}

    }
}
