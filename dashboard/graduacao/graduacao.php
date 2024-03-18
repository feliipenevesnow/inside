<?php
require_once '../fragmentos/fragmentos.php';

require_once '../../servico/GraduacaoService.php';
require_once '../../modelo/Graduacao.php';

imprimirHeader();
?>

<div class="container">
    <h1>Graduações</h1>
    
    <a href="cadastrar-editar-visualizar.php?cadastrar=true" class="btn btn-dark mt-3 mb-3">Cadastrar</a>

    <div class="table-responsive" style="margin-bottom: 100px">
    <table class="table table-red">
        <thead>
            <tr>
                <th>Graduação</th>
                <th>Descrição</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $graduacoes = buscarTodasGraduacoes();
            if ($graduacoes){
            foreach ($graduacoes as $graduacao) {
                ?>
                <tr>



                    <td>
                        <img class="myImg" width="100px" height="100px"
                            src="../../images/graduacao/<?php echo $graduacao->getImagem(); ?>" alt="">

                    </td>



                    <td>
                        <?php echo $graduacao->getDescricao(); ?>
                    </td>

                    <td>
                    <a style="margin: 10px" class="btn btn-dark" href="../../servico/GraduacaoService.php?codigo=<?php echo $graduacao->getCodigo(); ?>&servico=2"><i class="fa-solid fa-trash"></i></a>
                    </td>



                </tr>
                <?php }
                } else {
                    echo '<tr><td colspan="4">Nenhuma graduação encontrada.</td></tr>';
                } ?>





        </tbody>
    </table>

    <script>
        // JavaScript
        var modal = document.getElementById("myModal");
        var imgs = document.getElementsByClassName("myImg");
        var modalImg = document.getElementById("img01");
        var span = document.getElementsByClassName("close")[0];

        for (let i = 0; i < imgs.length; i++) {
            imgs[i].onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
            }
        }

        span.onclick = function () {
            modal.style.display = "none";
        }


    </script>
    </div>
</div>

<?php
imprimirFooter();
?>