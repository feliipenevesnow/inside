<?php

class Usuario
{

    private $codigo;
    private $nome;
    private $endereco;
    private $cidade;
    private $cpf;
    private $foto;
    private $estado;
    private $ativo;
    private $nivelAcesso;
    private $senha;

    public function __construct($codigo = null, $nome = null, $endereco = null, $cidade = null, $cpf = null, $foto = null, $estado = null, $ativo = null, $nivelAcesso = null)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->cpf = $cpf;
        $this->foto = $foto;
        $this->estado = $estado;
        $this->ativo = $ativo;
        $this->nivelAcesso = $nivelAcesso;
    }

    // Getters and setters

    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function setCodigo(int $codigo)
    {
        $this->codigo = $codigo;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade)
    {
        $this->cidade = $cidade;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }

    public function setFoto(string $foto)
    {
        $this->foto = $foto;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado)
    {
        $this->estado = $estado;
    }

    public function getAtivo(): bool
    {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }

    public function getNivelAcesso(): string
    {
        return $this->nivelAcesso;
    }

    public function setNivelAcesso(string $nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;
    }

}

?>