<?php

@include_once '../../controle/ControleGaleria.php';

@include_once '../controle/ControleGaleria.php';
@include_once 'controle/ControleGaleria.php';
@include_once '../modelo/Galeria.php';

// Define o serviço a ser executado
if (!isset($_GET['servico'])) {
    $_GET['servico'] = 0;
}

// Cria um objeto de controle de galeria
$controleGaleria = new ControleGaleria();

// Trata cada serviço SEM RETORNO
switch ($_GET['servico']) {
    case 0:

        break;
    case 1:
        // Inserir uma nova foto na galeria
        $galeria = new Galeria();
        session_start();
        $galeria->setProfessor($_SESSION['usuario']['codigo']);

        if (isset ($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
            $filename = substr(md5(uniqid(rand(), true)), 0, 50) . '.' . $extension;
            $destination = '../images/galeria/' . $filename;
      
      
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $destination)) {
              $galeria->setFoto($filename);
            }
      
          } else {
            header("Location: ../dashboard/galeria/cadastrar-editar-visualizar.php?erro=true");
          }

        $controleGaleria->inserir($galeria);
        header("Location: ../dashboard/galeria/galeria.php");
        break;
    case 2:
        // Deletar uma foto da galeria
        $galeria = new Galeria();
        $galeria->setCodigo($_GET['codigo']);
        $controleGaleria->deletar($galeria);
        unlink('../images/galeria/' . $_GET['foto']);
        header("Location: ../dashboard/galeria/galeria.php");
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
