<?php
require_once '../../servico/UsuarioService.php';
require_once '../../modelo/Usuario.php';
require_once '../../servico/PagamentoService.php';
require_once '../../modelo/Pagamento.php';



$searchQuery = isset ($_POST['query']) ? trim($_POST['query']) : '';
if (!is_string($searchQuery)) {
  throw new RuntimeException('Argument must be of type string, ' . gettype($name) . ' given');
}
if (isset ($searchQuer) && $searchQuer === '') {
  $searchQuer = " ";
}
$alunos = buscarAlunosPorNome($searchQuery);

$output = '';

if ($alunos) {
  foreach ($alunos as $aluno) {
    $pagamentos = buscarPagamentoPorAluno($aluno->getCodigo());
    $pagamento = buscarUltimoPagamentoPorIdUsuario($aluno->getCodigo());

    if (isset ($pagamento[0])) {
      $dataPagamento = $pagamento[0]->getDataPagamento();
      $dataVencimento = $pagamento[0]->getVencimento();
      $hoje = new DateTime();

      if ($hoje > $dataVencimento) {
        if (!$pagamento->getPagou()) {
          $status = "Atrasado";
        } else {
          $status = "Pago";
        }

      } else if ($hoje >= $dataPagamento && $hoje <= $dataVencimento) {
        $status = "Em dia";
      }
    } else {
      $status = "Aluno Novo";
    }

    echo '<tr>';
    echo '<td>';
    echo '<img class="myImg" width="150px" height="100px" src="../../images/usuario/' . $aluno->getFoto() . '" alt="">';
    echo '</td>';
    echo '<td>' . $aluno->getNome() . '</td>';
    if ($aluno->getAtivo()) {
      echo '<td>';
      switch ($status) {
        case "Atrasado":
          echo '<span class="btn btn-sm btn-danger">' . $status . '</span>';
          break;
        case "Em dia":
          echo '<span class="btn btn-sm btn-warning">' . $status . '</span>';
          break;
        default:
          echo '<span class="btn btn-sm btn-success">' . $status . '</span>';
      }
      echo '</td>';

      echo '<td>' . count($pagamentos) . ' Mensalidade(s)</td>';
    } else {
      echo '<td>-</td>';
      echo '<td>-</td>';
    }
    echo '<td>';
    if ($aluno->getAtivo()) {
      echo '<span class="btn btn-sm btn-success">ATIVO</span>';
    } else {
      echo '<span class="btn btn-sm btn-danger">EXCLUÍDO</span>';
    }
    echo '</td>';
    if ($aluno->getAtivo()) {
      echo '<td>';
      echo '<a style="margin: 10px" class="btn btn-dark" href="cadastrar-editar-visualizar.php?codigo=' . $aluno->getCodigo() . '&editar=true"><i class="fa-solid fa-pen-to-square"></i></a>';
      echo '<a style="margin: 10px" class="btn btn-dark" href="cadastrar-editar-visualizar.php?codigo=' . $aluno->getCodigo() . '&visualizar=true"><i class="fa-solid fa-eye"></i></a>';
      echo '<a style="margin: 10px" class="btn btn-dark" href="cadastrar-editar-visualizar.php?codigo=' . $aluno->getCodigo() . '"><i class="fa-solid fa-credit-card"></i></a>';
      echo '<a style="margin: 10px" class="btn btn-dark" href="../../servico/UsuarioService.php?servico=2&codigo=' . $aluno->getCodigo() . '"><i class="fa-solid fa-trash"></i></a>';
      echo '</td>';
    } else {
      echo '<td>';
      echo '<a style="margin: 10px" class="btn btn-dark" href="../../servico/UsuarioService.php?servico=4&codigo=' . $aluno->getCodigo() . '"><i class="fa-solid fa-user-check"></i> Reativar aluno</a>';
      echo '</td>';
    }
    echo '</tr>';
  }
} else {
  echo '<tr><td colspan="4">Nenhum aluno encontrado.</td></tr>';
}
?>