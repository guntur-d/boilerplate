<?php
class Database
{

    // CHANGE THE DB INFO ACCORDING TO YOUR DATABASE CONFIGURATION
    private $db_host = 'localhost';
    private $db_name = 'php_auth_api';
    private $db_username = 'root';
    private $db_password = 'root'; //if password is available for your MySQL db specify here

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
