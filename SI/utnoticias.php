<?php
include 'Admin/cfg/cfg.php';
 
class Usuarios {
    private $con;
 
    public function __construct() {
        $this->con = new Conexao();
    }   
 
    public function save($dados) {
        if(empty($dados['ID_Noticias']))
            $this->insert($dados);
        else
            $this->update($dados);
    }
 
    private function insert($dados) {
        $query = "insert into noticias (Titulo_Noticia, Resumo, Noticias, Autor, Data) values (:Titulo_Noticias,:Resumo,:Noticia,:Autor)";
        $stmt = $this->con->connect()->prepare($query);
        $stmt->bindParam(':Titulo_noticia', $dados['Titulo_Noticia']);
        $stmt->bindParam(':Resumo', $dados['Resumo']);
        $stmt->bindParam(':Noticias', $dados['Noticias']);
        $stmt->bindParam(':Autor', $dados['Autor']);
        $stmt->bindParam(':Data', $dados['Data']);
        $stmt->execute() ;
    }
 
    private function update($dados) {
        $query = "update noticias set Titulo_Noticia = :Titulo_Noticia, Resumo= :Resumo, Noticias= :Noticias, Autor= :Autor where ID_Noticia = :ID_Noticia";
        $stmt = $this->con->connect()->prepare($query);
        $stmt->bindParam(':Titulo_noticia', $dados['Titulo_Noticia']);
        $stmt->bindParam(':Resumo', $dados['Resumo']);
        $stmt->bindParam(':Noticias', $dados['Noticias']);
        $stmt->bindParam(':Autor', $dados['Autor']);
        $stmt->bindParam(':Data', $dados['Data']);
        $stmt->bindParam(':ID_Noticias', $dados['ID_Noticias']);
        $stmt->execute();
    }
 
    public function selecionaUsuario($id) {
        $stmt   = $this->con->connect()->prepare("select * from noticias where ID_Noticias = :ID_Noticias");
        $stmt->bindParam(':ID_Noticias', $id);
        $stmt->execute();
        $resultado = $stmt->fetch();
        return $resultado;
    }
 
    public function selecionaUsuarios() {
        $stmt   = $this->con->connect()->prepare("select * from noticias order by ID_Noticias");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $resultado;
    }
}

