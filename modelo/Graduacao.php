<?php

class Graduacao {

    private $codigo;
    private $descricao;
    private $imagem;
    private $ativo;

    public function __construct($codigo = null, $descricao = null, $imagem = null, $ativo = null) {
        $this->codigo = $codigo;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
        $this->ativo = $ativo;
    }

    // Getters and setters

    public function getCodigo(): int {
        return $this->codigo;
    }

    public function setCodigo(int $codigo) {
        $this->codigo = $codigo;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function setImagem(string $imagem) {
        $this->imagem = $imagem;
    }

    public function getAtivo(): bool {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo) {
        $this->ativo = $ativo;
    }

}

?>
