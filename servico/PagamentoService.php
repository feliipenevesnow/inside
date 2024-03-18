<?php

include_once '../../controle/ControlePagamento.php';

// Cria um objeto de controle de pagamento
$controlePagamento = new ControlePagamento();

// Define o serviço a ser executado
if (isset ($_GET['servico'])) {
    // Trata cada serviço SEM RETORNO
    switch ($_GET['servico']) {
        case 0:
           
            break;
        case 1:
            // Inserir um novo pagamento
            $pagamento = new Pagamento();
            $pagamento->setAluno($_POST['aluno']);
            $pagamento->setDataPagamento($_POST['data_pagamento']);
            $$pagamento->setVencimento($_POST['vencimento']);
            $pagamento->setPagou($_POST['pagou']);
            $controlePagamento->inserir($pagamento);
            break;
        case 2:
            // Deletar um pagamento
            $pagamento = new Pagamento();
            $pagamento->setCodigo($_GET['codigo']);
            $controlePagamento->deletar($pagamento);
            break;
        case 3:
            // Editar um pagamento
            $pagamento = new Pagamento();
            $pagamento->setAluno($_POST['aluno']);
            $pagamento->setDataPagamento($_POST['data_pagamento']);
            $$pagamento->setVencimento($_POST['vencimento']);
            $pagamento->setPagou($_POST['pagou']);
            $controlePagamento->editar($pagamento);
            break;
    }
}

// Trata cada serviço COM RETORNO

function buscarTodosPagamentos(): array {
    $controlePagamento = new ControlePagamento();
    $resultado = $controlePagamento->buscarTodos();
    $pagamentos = retornaListaPagamento($resultado);
    return $pagamentos;
  }

  function buscarPagamentoPorIdUsuario($usuarioId): array {
    $controlePagamento = new ControlePagamento();
    $resultado = $controlePagamento->buscarPagamentoPorIdUsuario($usuarioId);
    $pagamentos = retornaListaPagamento($resultado);
    return $pagamentos;
  }


  function buscarUltimoPagamentoPorIdUsuario($usuarioId): array {
    $controlePagamento = new ControlePagamento();
    $resultado = $controlePagamento->buscarUltimoPagamentoPorIdUsuario($usuarioId);
    $pagamentos = retornaListaPagamento($resultado);
    return $pagamentos;
  }

function buscarPagamentoPorAluno($alunoId): array
{
    $controlePagamento = new ControlePagamento();
    $pagamentosAluno = $controlePagamento->buscarPorAluno($alunoId);
    return $pagamentosAluno;
}

function retornaListaPagamento($resultado): array{
  $pagamentos = array_map(function ($pagamentoData) {
    return new Pagamento(
      $pagamentoData['codigo'],
      $pagamentoData['aluno'],
      $pagamentoData['data_pagamento'],
      $pagamentoData['vencimento'],
      $pagamentoData['pagou']
    );
  }, $resultado);
  return $pagamentos;
}

