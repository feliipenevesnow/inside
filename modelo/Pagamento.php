<?php

class Pagamento {

    private $codigo;
    private $aluno;
    private $dataPagamento;
    private $vencimento;
    private $pagou;

    public function __construct($codigo = null, $aluno = null, $dataPagamento = null, $vencimento = null, $pagou = null) {
        $this->codigo = $codigo;
        $this->aluno = $aluno;
        $this->dataPagamento = $dataPagamento;
        $this->vencimento = $vencimento;
        $this->pagou = $pagou;
    }

    // Getters and setters

    public function getCodigo(): int {
        return $this->codigo;
    }

    public function setCodigo(int $codigo) {
        $this->codigo = $codigo;
    }

    public function getAluno(): int {
        return $this->aluno;
    }

    public function setAluno(int $aluno) {
        $this->aluno = $aluno;
    }

    public function getDataPagamento(): DateTime {
        return new DateTime($this->dataPagamento);
    }

    public function setDataPagamento(DateTime $dataPagamento) {
        $this->dataPagamento = $dataPagamento->format('Y-m-d');
    }

    public function getVencimento(): DateTime {
        return new DateTime($this->vencimento);
    }

    public function setVencimento(DateTime $vencimento) {
        $this->vencimento = $vencimento->format('Y-m-d');
    }

    public function getPagou(): bool {
        return $this->pagou;
    }

    public function setPagou(bool $pagou) {
        $this->pagou = $pagou;
    }

}

?>
