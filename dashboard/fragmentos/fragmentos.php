<?php

function imprimirHeader()
{
  if (!isset($_SESSION)) {
    session_start();
}
  echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description'>
    <meta name='keywords'>
    <title>INSIDE Muay Thai e MMA</title>
    <link rel='icon' type='image/x-icon' href='../../images/favicon.png'>
    <link rel='stylesheet' href='../../assets/css/meu.css'>
    <link rel='stylesheet' href='//use.fontawesome.com/releases/v6.5.1/css/all.css'>
     <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
     <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js'></script>
 </head>
<body>
<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <div class='container-fluid'>
    <a class='navbar-brand' href='../../index.php'><img width='70px' height='50px' src='../../images/logo_inside.png' alt='logo'></a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
        <li class='nav-item'>
          <a class='nav-link' href='../pagamento/pagamento.php'>Pagamentos</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='../aluno/aluno.php'>Alunos</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../graduacao/graduacao.php'>Graduações</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../galeria/galeria.php'>Galeria</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='../aluno/perfil.php'>Perfil</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link' href='../aluno/sair.php'>Sair</a>
    </li>
      </ul>
    </div>
  </div>
</nav>";
}

function imprimirFooter()
{
  echo "   
<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js' integrity='sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r' crossorigin='anonymous'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js' integrity='sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy' crossorigin='anonymous'></script>

</body>
</html>";
}
