<?php
require_once '../fragmentos/fragmentos.php';
require_once '../../servico/UsuarioService.php';
require_once '../../modelo/Usuario.php';


$opcao = 2;
$usuario = buscarUsuarioPorId($_SESSION['usuario']['codigo']);


imprimirHeader();
?>

<div class="container" style="margin-bottom: 100px">
    <h1>
        Editar Perfil
    </h1>
    <form action="../../servico/UsuarioService.php?servico=3&codigo=<?php echo $usuario->getCodigo(); ?>" method="post"
        enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome"
                    value="<?php echo $opcao == 2 || $opcao == 3 || $opcao == 3 ? $usuario->getNome() : '' ?>" <?php echo $opcao == 3 ? 'disabled' : '' ?>>
            </div>
            <div class="col-md-6 mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf"
                    value="<?php echo $opcao == 2 || $opcao == 3 ? $usuario->getCpf() : '' ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade"
                    value="<?php echo $opcao == 2 || $opcao == 3 ? $usuario->getCidade() : 'Presidente Epitácio' ?>"
                    <?php echo $opcao == 3 ? 'disabled' : '' ?>>
            </div>
            <div class="col-md-4 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" <?php echo $opcao == 3 ? 'disabled' : '' ?>>
                    <?php
                    $estados = array(
                        "SP" => "SP - SÃO PAULO",
                        "AC" => "AC - ACRE",
                        "AL" => "AL - ALAGOAS",
                        "AP" => "AP - AMAPÁ",
                        "AM" => "AM - AMAZONAS",
                        "BA" => "BA - BAHIA",
                        "CE" => "CE - CEARÁ",
                        "DF" => "DF - DISTRITO FEDERAL",
                        "ES" => "ES - ESPÍRITO SANTO",
                        "GO" => "GO - GOIÁS",
                        "MA" => "MA - MARANHÃO",
                        "MT" => "MT - MATO GROSSO",
                        "MS" => "MS - MATO GROSSO DO SUL",
                        "MG" => "MG - MINAS GERAIS",
                        "PA" => "PA - PARÁ",
                        "PB" => "PB - PARAÍBA",
                        "PR" => "PR - PARANÁ",
                        "PE" => "PE - PERNAMBUCO",
                        "PI" => "PI - PIAUÍ",
                        "RJ" => "RJ - RIO DE JANEIRO",
                        "RN" => "RN - RIO GRANDE DO NORTE",
                        "RS" => "RS - RIO GRANDE DO SUL",
                        "RO" => "RO - RONDÔNIA",
                        "RR" => "RR - RORAIMA",
                        "SC" => "SC - SANTA CATARINA",
                        "SE" => "SE - SERGIPE",
                        "TO" => "TO - TOCANTINS"
                    );

                    foreach ($estados as $sigla => $nome) {
                        $selected = $opcao == 2 && $usuario->getEstado() == $sigla ? 'selected' : '';
                        echo "<option value='$sigla' $selected>$nome</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="contato" class="form-label">Contato</label>
                <input type="text" class="form-control" id="contato" name="contato"
                    value="<?php echo $opcao == 2 || $opcao == 3 ? $usuario->getContato() : '' ?>" disabled>
            </div>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco"
                value="<?php echo $opcao == 2 || $opcao == 3 ? $usuario->getEndereco() : '' ?>" <?php echo $opcao == 3 ? 'disabled' : '' ?>>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" <?php echo $opcao == 3 ? 'disabled' : '' ?>>
            </div>
            <div class="col-md-6 mb-3">
                <img id="preview" <?php if ($opcao !== 1) {
                    echo "src='../../images/usuario/" . $usuario->getFoto() . "'";
                } else {
                    echo "src='../../images/usuario/user.png'";
                } ?> alt="your image"
                    style="max-width: 200px; max-height: 200px;" />
            </div>
        </div>
        <div class="mb-3">
            <label for="nivelAcesso" class="form-label">Nível de Acesso</label>
            <select class="form-select" id="nivelAcesso" name="nivel_acesso" <?php echo $opcao == 3 ? 'disabled' : '' ?>>
                <option value="Aluno" <?php echo $opcao == 2 || $opcao == 3 && $usuario->getNivelAcesso() == 'Aluno' ? 'selected' : '' ?>>
                    Aluno</optio n>
                <option value="Professor" <?php echo $opcao == 2 || $opcao == 3 && $usuario->getNivelAcesso() == 'Professor' ? 'selected' : '' ?>>Professor
                </option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="senha" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="senha" name="senha">
            </div>
            <div class="col-md-6 mb-3">
                <label for="senha" class="form-label">Confirme a Senha</label>
                <input type="password" class="form-control" id="senha" name="senha_confirma">
            </div>
            <?php if (isset ($_GET['erro'])) { ?>
                <div class="mb-3" style="color: red">
                    As duas senhas não batem!
                </div>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-dark " <?php echo $opcao == 3 ? 'hidden' : '' ?>>
            Editar
        </button>
        <a href="aluno.php" type="submit" class="btn btn-dark ">
            Cancelar
        </a>
    </form>
</div>


<script>
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00');
        $('#contato').mask('(00) 00000-0000')
        $("#foto").change(function () {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<?php
imprimirFooter();
?>