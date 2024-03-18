<?php
require_once '../fragmentos/fragmentos.php';

require_once '../../servico/GaleriaService.php';
require_once '../../modelo/Galeria.php';

imprimirHeader();
?>

<div class="container">
    <h1>Galeria</h1>
    
    <a href="cadastrar.php?cadastrar=true" class="btn btn-dark mt-3 mb-3">Cadastrar</a>

    <div class="table-responsive" style="margin-bottom: 100px">
    <table class="table table-red">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fotos = buscarTodasFotos();

            if ($fotos){
            foreach ($fotos as $foto) {

                ?>
                <tr>



                    <td>
                        <img class="myImg" width="100px" height="100px"
                            src="../../images/galeria/<?php echo $foto['foto']; ?>" alt="">

                    </td>

                    <td>
                    <a style="margin: 10px" class="btn btn-dark" href="../../servico/GaleriaService.php?codigo=<?php echo $foto['codigo']; ?>&servico=2&foto=<?php echo $foto['foto']; ?>"><i class="fa-solid fa-trash"></i></a>
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