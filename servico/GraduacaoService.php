<?php

@include_once '../../controle/ControleGraduacao.php';

@include_once '../controle/ControleGraduacao.php';
@include_once '../modelo/Graduacao.php';

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
        $graduacao->setDescricao($_POST['descricao']);
        $graduacao->setAtivo(true);
        

        if (isset ($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $filename = substr(md5(uniqid(rand(), true)), 0, 50) . '.' . $extension;
            $destination = '../images/graduacao/' . $filename;
      
      
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $destination)) {
              $graduacao->setImagem($filename);
            }
      
          } else {
            header("Location: ../dashboard/graduacao/cadastrar-editar-visualizar.php?erro=true");
          }

        $controleGraduacao->inserir($graduacao);
        header("Location: ../dashboard/graduacao/graduacao.php");
        break;
    case 2:
        // Deletar uma graduação
        $graduacao = new Graduacao();
        $graduacao->setCodigo($_GET['codigo']);
        $controleGraduacao->deletar($graduacao);
        header("Location: ../dashboard/graduacao/graduacao.php");
        break;
    case 3:
        // Editar uma graduação
        $graduacao = new Graduacao();
        $graduacao->setCodigo($_GET['codigo']);
        $graduacao->setDescricao($_POST['descricao']);
        $graduacao->setAtivo(true);
        $graduacao->setImagem($_POST['foto']);
        $controleGraduacao->editar($graduacao);
        header("Location: ../dashboard/graduacao/graduacao.php");
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
