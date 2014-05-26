<?php
include 'Admin/cfg/cfg.php';
 
class Usuarios {
    private $con;
 
    public function __construct() {
        $this->con = new Conexao();
    }   
 
    public function save($dados) {
        if(empty($dados['ID_Utilizadores']))
            $this->insert($dados);
        else
            $this->update($dados);
    }
 
    private function insert($dados) {
        $query = "insert into utilizadores (Username, Pass, Email, Nome) values (:Username,  sha1(:Pass), :Email, :Nome)";
        $stmt = $this->con->connect()->prepare($query);
        $stmt->bindParam(':Username', $dados['Username']);
        $stmt->bindParam(':Pass', $dados['Pass']);
        $stmt->bindParam(':Email', $dados['Email']);
        $stmt->bindParam(':Nome', $dados['Nome']);
        $stmt->execute();
    }
 
    private function update($dados) {
        $query = "update utilizadores set Username = :Username, Pass = md5(:Pass),Email = :Email, Nome = :Nome where ID_Utilizadores = :ID_Utilizadores";
        $stmt = $this->con->connect()->prepare($query);
        $stmt->bindParam(':Username', $dados['Username']);
        $stmt->bindParam(':Pass', $dados['Pass']);
        $stmt->bindParam(':Email', $dados['Email']);
        $stmt->bindParam(':Nome', $dados['Nome']);
        $stmt->bindParam(':ID_Utilizadores', $dados['ID_Utilizadores']);
        $stmt->execute();
    }
 
    public function selecionaUsuario($id) {
        $stmt   = $this->con->connect()->prepare("select * from utilizadores where ID_Utilizadores = :ID_Utilizadores");
        $stmt->bindParam(':ID_Utilizadores', $id);
        $stmt->execute();
        $resultado = $stmt->fetch();
        return $resultado;
    }
 
    public function selecionaUsuarios() {
        $stmt   = $this->con->connect()->prepare("select * from utilizadores order by ID_Utilizadores");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $resultado;
    }
}

