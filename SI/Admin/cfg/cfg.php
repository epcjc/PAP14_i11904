<?php
class Conexao {
    private $user;
    private $password;
    private $host;
    private $db_name;
 
    public function __construct() {
        $this->user     = 'i11904';
        $this->password = 'Covtoap8';
        $this->host     = 'localhost';
        $this->db_name  = 'i11904';
    }
 
    public function connect() {
        return new PDO('mysql:host=' . $this->host  . ';dbname=' . $this->db_name, $this->user, $this->password);
    }
}


