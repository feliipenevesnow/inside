<?php

include_once 'Conexao.php';

class ControleGrau {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }

    public function inserir(Grau $grau) {
        $sql = "INSERT INTO grau (aluno, graduacao, certificado) VALUES (:aluno, :graduacao, :certificado)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":aluno", $grau->getAluno());
        $stmt->bindValue(":graduacao", $grau->getGraduacao());
        $stmt->bindValue(":certificado", $grau->getCertificado());
        $stmt->execute();
    }

    public function deletar(Grau $grau) {
        $sql = "DELETE FROM grau WHERE aluno = :aluno AND graduacao = :graduacao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":aluno", $grau->getAluno());
        $stmt->bindValue(":graduacao", $grau->getGraduacao());
        $stmt->execute();
    }

    public function editar(Grau $grau) {
        $sql = "UPDATE grau SET certificado = :certificado WHERE aluno = :aluno AND graduacao = :graduacao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":aluno", $grau->getAluno());
        $stmt->bindValue(":graduacao", $grau->getGraduacao());
        $stmt->bindValue(":certificado", $grau->getCertificado());
        $stmt->execute();
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM grau";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorAluno(int $alunoId) {
        $sql = "SELECT * FROM grau WHERE aluno = :aluno";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":aluno", $alunoId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorGraduacao(int $graduacaoId) {
        $sql = "SELECT * FROM grau WHERE graduacao = :graduacao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":graduacao", $graduacaoId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorAlunoGraduacao(Grau $grau) {
        $sql = "SELECT * FROM grau WHERE aluno = :aluno AND graduacao = :graduacao";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":aluno", $grau->getAluno());
        $stmt->bindValue(":graduacao", $grau->getGraduacao());
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>
