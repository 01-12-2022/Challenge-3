<?php
namespace connection;

class DatabaseConnection
{
    
    private $host;
    private $database;
    private $username;
    private $password;
    private int $port;
    
    private \mysqli $connection;
    
    function __construct($host, $database, $username, $password, $port) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
    }
    
    function getConnection() : \mysqli {
    	return $this->connection;
    }
    
    function connect() : \mysqli {
    	$this->connection = new \mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
    	
    	if ($this->connection -> connect_errno) {
    		echo "Failed to connect to MySQL: " . $this->connection -> connect_error;
    		exit();
    	}
    	
        return $this->connection;
    }
    
    function disconnect() {
        mysqli_close($this->conntection);
    }
    
    function query($statement) : \mysqli_result {
        return $this->getConnection()->query($statement);
    }
}

