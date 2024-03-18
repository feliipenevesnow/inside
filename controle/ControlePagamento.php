<?php

include_once '../../controle/Conexao.php';

class ControlePagamento {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }

    public function inserir(Pagamento $pagamento) {
        $sql = "INSERT INTO pagamento (aluno, data_pagamento, vencimento, pagou) VALUES (:aluno, :data_pagamento, :vencimento, :pagou)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":aluno", $pagamento->getAluno());
        $stmt->bindValue(":data_pagamento", $pagamento->getDataPagamento()->format('Y-m-d'));
        $stmt->bindValue(":vencimento", $pagamento->getVencimento()->format('Y-m-d'));
        $stmt->bindValue(":pagou", $pagamento->getPagou());
        $stmt->execute();
    }

    public function deletar(Pagamento $pagamento) {
        $sql = "DELETE FROM pagamento WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $pagamento->getCodigo());
        $stmt->execute();
    }

    public function editar(Pagamento $pagamento) {
        $sql = "UPDATE pagamento SET aluno = :aluno, data_pagamento = :data_pagamento, vencimento = :vencimento, pagou = :pagou WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $pagamento->getCodigo());
        $stmt->bindValue(":aluno", $pagamento->getAluno());
        $stmt->bindValue(":data_pagamento", $pagamento->getDataPagamento()->format('Y-m-d'));
        $stmt->bindValue(":vencimento", $pagamento->getVencimento()->format('Y-m-d'));
        $stmt->bindValue(":pagou", $pagamento->getPagou());
        $stmt->execute();
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM pagamento";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id) {
        $sql = "SELECT * FROM pagamento WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorAluno(int $alunoId) {
        $sql = "SELECT * FROM pagamento WHERE aluno = :aluno";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":aluno", $alunoId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPagamentosVencidos() {
        $sql = "SELECT * FROM pagamento WHERE vencimento < :data_hoje AND pagou = 0";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":data_hoje", date('Y-m-d'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPagamentoPorIdUsuario(int $usuarioId) {
        $sql = "SELECT * FROM pagamento WHERE usuario = :usuario";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":usuario", $usuarioId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarUltimoPagamentoPorIdUsuario($usuarioId) {
        $sql = "SELECT * FROM pagamento WHERE aluno = :usuario ORDER BY data_pagamento DESC LIMIT 1";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":usuario", $usuarioId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

}

?>
