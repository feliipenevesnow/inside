<?php

class Grau {

    private $aluno;
    private $graduacao;
    private $certificado;

    public function __construct($aluno = null, $graduacao = null, $certificado = null) {
        $this->aluno = $aluno;
        $this->graduacao = $graduacao;
        $this->certificado = $certificado;
    }

    // Getters and setters

    public function getAluno(): int {
        return $this->aluno;
    }

    public function setAluno(int $aluno) {
        $this->aluno = $aluno;
    }

    public function getGraduacao(): int {
        return $this->graduacao;
    }

    public function setGraduacao(int $graduacao) {
        $this->graduacao = $graduacao;
    }

    public function getCertificado(): string {
        return $this->certificado;
    }

    public function setCertificado(string $certificado) {
        $this->certificado = $certificado;
    }

}

?>
