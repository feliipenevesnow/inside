<?php

@include_once '../../controle/ControleUsuario.php';

@include_once '../controle/ControleUsuario.php';
@include_once '../controle/ControleGrau.php';

@include_once '../modelo/Usuario.php';
@include_once '../modelo/Grau.php';

session_start();

// Define o serviço a ser executado
if (!isset ($_GET['servico'])) {
  $_GET['servico'] = 0;
}

// Cria um objeto de controle de usuário
$controleUsuario = new ControleUsuario();

// Trata cada serviço SEM RETORNO
switch ($_GET['servico']) {
  case 0:
    if (isset ($_POST['cpf'])) {
      $cpf = $_POST['cpf'];
      $senha = $_POST['senha'];

      if ($controleUsuario->login($cpf, $senha)) {
        header("Location: ../dashboard/aluno/aluno.php");
      } else {
        header("Location: ../login.php?erro=true");
      }
    }
    break;
  case 1:
    // Inserir um novo usuário
    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEndereco($_POST['endereco']);
    $usuario->setCidade($_POST['cidade']);
    $usuario->setCpf($_POST['cpf']);
    $usuario->setEstado($_POST['estado']);
    $usuario->setAtivo(true);
    $usuario->setNivelAcesso($_POST['nivel_acesso']);
    $usuario->setContato($_POST['contato']);

    if (isset ($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
      $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
      $filename = substr(md5(uniqid(rand(), true)), 0, 50) . '.' . $extension;
      $destination = '../images/usuario/' . $filename;


      if (move_uploaded_file($_FILES['foto']['tmp_name'], $destination)) {
        $usuario->setFoto($filename);
      }

    } else {
      $usuario->setFoto('user.png');
    }

    $controleUsuario->inserir($usuario);

    $id = $controleUsuario->ultimoCadastroId();

    if (isset ($_POST['graduacao']) && $_POST['graduacao'] != 0) {
      inserirNovoGrau($id, $_POST['graduacao']);
    }

    header("Location: ../dashboard/aluno/aluno.php");
    break;
  case 2:
    // Deletar um usuário
    $usuario = new Usuario();
    $usuario->setCodigo($_GET['codigo']);
    $controleUsuario->deletar($usuario);
    header("Location: ../dashboard/aluno/aluno.php");
    break;
  case 3:
    // Editar um usuário
    $usuario_antigo = buscarUsuarioPorId($_GET['codigo']);
    $foto_antiga = $usuario_antigo->getFoto();

    $usuario = new Usuario();
    $usuario->setCodigo($_GET['codigo']);
    $usuario->setNome($_POST['nome']);
    $usuario->setEndereco($_POST['endereco']);
    $usuario->setCidade($_POST['cidade']);
    $usuario->setCpf($_POST['cpf']);
    $usuario->setEstado($_POST['estado']);
    $usuario->setAtivo(true);
    $usuario->setNivelAcesso($_POST['nivel_acesso']);
    $usuario->setContato($_POST['contato']);

    if (isset ($_POST['senha'])) {
      if ($_POST['senha'] == $_POST['senha_confirma']) {
        $usuario->setSenha($_POST['senha']);
      } else {
        header("Location: ../dashboard/aluno/perfil.php?erro=true");
      }
    }


    if (isset ($_FILES['foto']) && $_FILES['foto']['error'] == 0) {

      unlink('../images/usuario/' . $foto_antiga);


      $extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
      $filename = substr(md5(uniqid(rand(), true)), 0, 50) . '.' . $extension;
      $destination = '../images/usuario/' . $filename;

      if (move_uploaded_file($_FILES['foto']['tmp_name'], $destination)) {
        $usuario->setFoto($filename);
      }

    } else {

      $usuario->setFoto($foto_antiga);
    }

    if (isset ($_POST['graduacao']) && $_POST['graduacao'] != 0) {
      deletarGrau($_GET['codigo']);
      inserirNovoGrau($_GET['codigo'], $_POST['graduacao']);
    } else {
      deletarGrau($_GET['codigo']);
    }

    if (!isset ($_POST['senha'])) {
      $controleUsuario->editar($usuario, false);
      header("Location: ../dashboard/aluno/aluno.php");
    } else {
      $controleUsuario->editar($usuario, true);
      header("Location: ../dashboard/aluno/perfil.php");
    }
    break;
  case 4:
    // reativar usuário
    $usuario = new Usuario();
    $usuario->setCodigo($_GET['codigo']);
    $controleUsuario->reativar($usuario);
    header("Location: ../dashboard/aluno/aluno.php");
    break;
}

// Trata cada serviço COM retorno

function buscarTodosUsuarios(): array
{
  $controleUsuario = new ControleUsuario();
  $resultado = $controleUsuario->buscarTodos();
  $usuarios = retornaListUsuario($resultado);
  return $usuarios;
}

function inserirNovoGrau($aluno, $graduacao)
{
  $controleGrau = new ControleGrau();
  $grau = new Grau();
  $grau->setAluno($aluno);
  $grau->setGraduacao($graduacao);
  print_r($grau);
  $controleGrau->inserir($grau);
}

function deletarGrau($aluno)
{
  $controleGrau = new ControleGrau();
  $grau = new Grau();
  $grau->setAluno($aluno);
  $controleGrau->deletar($grau);
}


function buscarUsuarioPorId($id): Usuario
{
  $controleUsuario = new ControleUsuario();
  $resultado = $controleUsuario->buscarPorId($id);

  if (!$resultado) {
    return null;
  }

  $usuario = new Usuario();
  $usuario->setCodigo($resultado['codigo']);
  $usuario->setNome($resultado['nome']);
  $usuario->setEndereco($resultado['endereco']);
  $usuario->setCidade($resultado['cidade']);
  $usuario->setCpf($resultado['cpf']);
  $usuario->setFoto($resultado['foto']);
  $usuario->setEstado($resultado['estado']);
  $usuario->setAtivo($resultado['ativo']);
  $usuario->setNivelAcesso($resultado['nivel_acesso']);
  $usuario->setContato($resultado['contato']);

  return $usuario;
}

function buscarAlunosPorNome($nome): array
{

  $controleUsuario = new ControleUsuario();
  $resultado = $controleUsuario->buscarPorNome($nome);

  if (!$resultado) {
    return [];
  }

  $usuarios = retornaListUsuario($resultado);

  return $usuarios;
}


function retornaListUsuario($resultado): array
{
  $usuarios = array_map(function ($usuarioData) {
    $usuario = new Usuario();
    $usuario->setCodigo($usuarioData['codigo']);
    $usuario->setNome($usuarioData['nome']);
    $usuario->setEndereco($usuarioData['endereco']);
    $usuario->setCidade($usuarioData['cidade']);
    $usuario->setCpf($usuarioData['cpf']);
    $usuario->setFoto($usuarioData['foto']);
    $usuario->setEstado($usuarioData['estado']);
    $usuario->setAtivo($usuarioData['ativo']);
    $usuario->setNivelAcesso($usuarioData['nivel_acesso']);
    $usuario->setContato($usuarioData['contato']);
    $usuario->setSenha($usuarioData['senha']);
    return $usuario;
  }, $resultado);
  return $usuarios;
}
