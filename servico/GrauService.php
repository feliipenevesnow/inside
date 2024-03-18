<?php
@include_once '../../controle/ControleGrau.php';
@include_once '../controle/ControleGrau.php';
@include_once '../modelo/Grau.php';
// Define o serviço a ser executado
if (!isset($_GET['servico'])) {
    $_GET['servico'] = 0;
}

// Cria um objeto de controle de grau
$controleGrau = new ControleGrau();


// Função para inserir um novo grau


 function buscarPorAluno(int $alunoId) {
    $controleGrau = new ControleGrau();
    print_r($alunoId);
    return $controleGrau->buscarPorAluno($alunoId);
}


// Função para editar um grau
function editarGrau($aluno, $graduacao) {
    $controleGrau = new ControleGrau();
    $grau = new Grau();
    $grau->setAluno($aluno);
    $grau->setGraduacao($graduacao);
    $controleGrau->editar($grau);
}

?>
