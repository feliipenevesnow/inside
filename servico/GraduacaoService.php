<?php

include_once '../../controle/ControleGraduacao.php';

// Define o serviço a ser executado
if (!isset ($_GET['servico'])) {
    $_GET['servico'] = 0;
}

// Cria um objeto de controle de graduação
$controleGraduacao = new ControleGraduacao();

// Trata cada serviço SEM RETORNO
switch ($_GET['servico']) {
    case 0:

        break;
    case 1:
        // Inserir uma nova graduação
        $graduacao = new Graduacao();
        $graduacao->setCodigo($_POST['codigo']);
        $graduacao->setDescricao($_POST['nome']);
        $graduacao->setAtivo($_POST['instituicao']);
        $graduacao->setImagem($_POST['ano_conclusao']);
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
        $graduacao->setDescricao($_POST['nome']);
        $graduacao->setAtivo($_POST['instituicao']);
        $graduacao->setImagem($_POST['ano_conclusao']);
        $controleGraduacao->editar($graduacao);
        break;
}

// Trata cada serviço COM RETORNO

function buscarTodasGraduacoes(): array
{
    $controleGraduacao = new ControleGraduacao();
    $resultado = $controleGraduacao->buscarTodos();
    $graduacoes = retornaListaGraduacoes($resultado);
    return $graduacoes;
}

function retornaListaGraduacoes($resultado): array
{
    $graduacoes = array_map(function ($pagamentoData) {
        return new Graduacao(
            $pagamentoData['codigo'],
            $pagamentoData['descricao'],
            $pagamentoData['imagem'],
            $pagamentoData['ativo']
        );
    }, $resultado);
    return $graduacoes;
}
