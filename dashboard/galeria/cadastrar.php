<?php
require_once '../fragmentos/fragmentos.php';
require_once '../../servico/GaleriaSerivce.php';
require_once '../../modelo/Galeria.php';



imprimirHeader();
?>

<div class="container" style="margin-bottom: 100px">
    <h1>
       Cadastrar
    </h1>
    <form action="../../servico/GaleriaSerivce.php?servico=1" method="post" enctype="multipart/form-data">
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
        <button type="submit" class="btn btn-dark " <?php echo $opcao == 3 ? 'hidden' : '' ?>>
            cadastrar
        </button>
        <a href="aluno.php" type="submit" class="btn btn-dark ">
            Cancelar
        </a>
    </form>
</div>


<script>
    $(document).ready(function () {
        $('#cpf').mask('000.000.000-00');
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