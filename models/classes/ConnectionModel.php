<?php

class Connection {
    private $db_server = "localhost";
    private $db_user = "root";
    private $db_password = "root";
    private $db_name = "teachers_db";
    
    public function connect_db () {
        $connect = mysqli_connect($this->db_server, $this->db_user, $this->db_password);
        if ($connect) {
            mysqli_select_db($connect, $this->db_name);
        }
        return $connect;
    }
    
    public function disconnect_db () {
        mysqli_close();
    }
}