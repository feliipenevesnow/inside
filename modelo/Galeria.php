<?php

class Galeria {

    private $codigo;
    private $professor;
    private $foto;

    public function __construct($codigo = null, $professor = null, $foto = null) {
        $this->codigo = $codigo;
        $this->professor = $professor;
        $this->foto = $foto;
    }

    // Getters and setters

    public function getCodigo(): int {
        return $this->codigo;
    }

    public function setCodigo(int $codigo) {
        $this->codigo = $codigo;
    }

    public function getProfessor(): int {
        return $this->professor;
    }

    public function setProfessor(int $professor) {
        $this->professor = $professor;
    }

    public function getFoto(): string {
        return $this->foto;
    }

    public function setFoto(string $foto) {
        $this->foto = $foto;
    }

}

?>
