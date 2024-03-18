<?php

include_once '../controle/ControleGraduacao.php';

// Define o serviço a ser executado
if (!isset($_GET['servico'])) {
    $_GET['servico'] = 0;
}

// Cria um objeto de controle de graduação
$controleGraduacao = new ControleGraduacao();

// Trata cada serviço SEM RETORNO
switch ($_GET['servico']) {
    case 0:
        // Redireciona para a página de graduação
        header('Location: ../dashboard/graduacao.php');
        break;
    case 1:
        // Inserir uma nova graduação
        $graduacao = new Graduacao();
        $graduacao->setDescricao($_POST['descricao']);
        $graduacao->setImagem($_POST['imagem']);
        $graduacao->setAtivo($_POST['ativo']);
        $controleGraduacao->inserir($graduacao);
        break;
    case 2:
        // Deletar uma graduação
        $graduacao = new Graduacao();
        $graduacao->setCodigo($_GET['codigo']);
        $controleGraduacao->deletar($graduacao);
        break;
    case 3:
        // Editar uma graduação
        $graduacao = new Graduacao();
        $graduacao->setCodigo($_POST['codigo']);
        $graduacao->setDescricao($_POST['descricao']);
        $graduacao->setImagem($_POST['imagem']);
        $graduacao->setAtivo($_POST['ativo']);
        $controleGraduacao->editar($graduacao);
        break;
}

// Trata cada serviço COM RETORNO

function buscarTodasGraduacoes(): array {
    $controleGraduacao = new ControleGraduacao();
    $graduacoes = $controleGraduacao->buscarTodos();
    return $graduacoes;
}

function buscarGraduacaoPorId($id): array {
    $controleGraduacao = new ControleGraduacao();
    $graduacao = $controleGraduacao->buscarPorId($id);
    return $graduacao;
}

function buscarGraduacoesAtivas(): array {
    $controleGraduacao = new ControleGraduacao();
    $graduacoesAtivas = $controleGraduacao->buscarAtivas();
    return $graduacoesAtivas;
}
