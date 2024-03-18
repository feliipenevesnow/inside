<?php
require_once '../fragmentos/fragmentos.php';
require_once '../../servico/GraduacaoService.php';
require_once '../../modelo/Graduacao.php';

$opcao = 0;

if (isset ($_GET['cadastrar'])) {
    $opcao = 1;
}


imprimirHeader();
?>

<div class="container" style="margin-bottom: 100px">
    <h1>
        Cadastrar
    </h1>
    <form action="../../servico/GraduacaoService.php?servico=1" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class=" mb-3">
                <label for="nome" class="form-label">Descrição</label>
                <input type="text" class="form-control" required id="nome" name="descricao">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <?php if (!isset ($_GET['erro'])) { ?>
                    <label for="foto" class="form-label">Foto</label>
                <?php } else { ?>
                    <label for="foto" style="color:red" required class="form-label"><b>*Foto (É necessário)</b></label>
                <?php } ?>
                <input type="file" class="form-control" id="foto" name="foto" <?php echo $opcao == 3 ? 'disabled' : '' ?>>
            </div>
            <div class="col-md-6 mb-3">
                <img id="preview" src='../../images/graduacao/img.avif' alt="your image"
                    style="max-width: 200px; max-height: 200px;" />
            </div>
        </div>

        <button type="submit" class="btn btn-dark " <?php echo $opcao == 3 ? 'hidden' : '' ?>>
            Cadastrar
        </button>
        <a href="graduacao.php" type="submit" class="btn btn-dark ">
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