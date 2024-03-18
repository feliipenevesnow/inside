<?php

include_once 'Conexao.php';

class ControleGaleria {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getInstance();
    }

    public function inserir(Galeria $galeria) {
        $sql = "INSERT INTO galeria (professor, foto) VALUES (:professor, :foto)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":professor", $galeria->getProfessor());
        $stmt->bindValue(":foto", $galeria->getFoto());
        $stmt->execute();
    }

    public function deletar(Galeria $galeria) {
        $sql = "DELETE FROM galeria WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $galeria->getCodigo());
        $stmt->execute();
    }

    public function editar(Galeria $galeria) {
        $sql = "UPDATE galeria SET foto = :foto WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $galeria->getCodigo());
        $stmt->bindValue(":foto", $galeria->getFoto());
        $stmt->execute();
    }

    public function buscarTodos() {
        $sql = "SELECT * FROM galeria ORDER BY codigo DESC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id) {
        $sql = "SELECT * FROM galeria WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":codigo", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>
