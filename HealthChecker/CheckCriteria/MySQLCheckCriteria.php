<?php

namespace CheckCriteria;

/**
 * Class MySQLCheckCriteria
 * @package CheckCriteria
 */
class MySQLCheckCriteria implements ICheckCriteria {

    private $host;

    private $username;

    private $password;

    private $database;

    public function __construct($host, $username, $password, $database){
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function check() {
        $conn = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        $databaseAvailable = TRUE;
        if ($conn->connect_error) {
            $databaseAvailable = "Could not connect to the database host " . $this->host;
        }

        mysqli_close($conn);
        return $databaseAvailable;
    }

    public function getName() {
        return "Relational database health check";
    }


}