<?php

include_once '../controle/ControleGaleria.php';

// Define o serviço a ser executado
if (!isset($_GET['servico'])) {
    $_GET['servico'] = 0;
}

// Cria um objeto de controle de galeria
$controleGaleria = new ControleGaleria();

// Trata cada serviço SEM RETORNO
switch ($_GET['servico']) {
    case 0:
        // Redireciona para a página de galeria
        header('Location: ../dashboard/galeria.php');
        break;
    case 1:
        // Inserir uma nova foto na galeria
        $galeria = new Galeria();
        $galeria->setProfessor($_POST['professor']);
        $galeria->setFoto($_POST['foto']);
        $controleGaleria->inserir($galeria);
        break;
    case 2:
        // Deletar uma foto da galeria
        $galeria = new Galeria();
        $galeria->setCodigo($_GET['codigo']);
        $controleGaleria->deletar($galeria);
        break;
    case 3:
        // Editar uma foto da galeria
        $galeria = new Galeria();
        $galeria->setCodigo($_POST['codigo']);
        $galeria->setProfessor($_POST['professor']);
        $galeria->setFoto($_POST['foto']);
        $controleGaleria->editar($galeria);
        break;
}

// Trata cada serviço COM RETORNO

function buscarTodasFotos(): array {
    $controleGaleria = new ControleGaleria();
    $fotos = $controleGaleria->buscarTodos();
    return $fotos;
}


function buscarFotoPorId($id): array {
    $controleGaleria = new ControleGaleria();
    $foto = $controleGaleria->buscarPorId($id);
    return $foto;
}
