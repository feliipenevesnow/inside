<?php

include_once '../../controle/Conexao.php';

class ControleGraduacao {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }

    public function inserir(Graduacao $graduacao) {
        $sql = "INSERT INTO graduacao (descricao, imagem, ativo) VALUES (:descricao, :imagem, :ativo)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":descricao", $graduacao->getDescricao());
        $stmt->bindValue(":imagem", $graduacao->getImagem());
        $stmt->bindValue(":ativo", $graduacao->getAtivo());
        $stmt->execute();
    }

    public function deletar(Graduacao $graduacao)
    {

        $sql = "SELECT * FROM grau WHERE graduacao = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $graduacao->getCodigo());
        $stmt->execute();
        $result = $stmt->fetchAll();
    
        if($result){
            $sql = "UPDATE graduacao SET ativo = false WHERE codigo = :codigo";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":codigo", $graduacao->getCodigo());
            $stmt->execute();
        } else {
            $sql = "DELETE FROM graduacao WHERE codigo = :codigo";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(":codigo", $graduacao->getCodigo());
            $stmt->execute();
        }
    }
    

    public function editar(Graduacao $graduacao) {
        $sql = "UPDATE graduacao SET descricao = :descricao, imagem = :imagem, ativo = :ativo WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $graduacao->getCodigo());
        $stmt->bindValue(":descricao", $graduacao->getDescricao());
        $stmt->bindValue(":imagem", $graduacao->getImagem());
        $stmt->bindValue(":ativo", $graduacao->getAtivo());
        $stmt->execute();
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM graduacao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id) {
        $sql = "SELECT * FROM graduacao WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarAtivas() {
        $sql = "SELECT * FROM graduacao WHERE ativo = 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}


