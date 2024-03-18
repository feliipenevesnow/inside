<!DOCTYPE html>
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
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js'></script>
</head>

<body>
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
        <div class='container-fluid'>
            <a class='navbar-brand' href='index.php'><img width='70px' height='50px' src='images/logo_inside.png'
                    alt='logo'></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>

        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card rounded">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <form action="servico/UsuarioService.php?servico=0" method="POST">
                            <div class="form-group mb-5">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" class="form-control" id="cpf"
                                    placeholder="###.###.###-##">
                            </div>
                            <div class="form-group mb-5">
                                <label for="senha">Senha</label>
                                <input type="password" name="senha" class="form-control" id="senha">
                                <?php
                                if (isset ($_GET["erro"])) {
                                    ?>
                                    <p style="color: red">CPF ou Senha incorreto(s)!</p>
                                <?php
                                }
                                ?>
                            </div>
                            <button type="submit" class="btn btn-dark btn-block">Logar</button>
                            <button type="button" class="btn btn-light btn-block"
                                onclick="history.back();">Voltar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#cpf').mask('000.000.000-00');
        });
    </script>

</body>

</html>