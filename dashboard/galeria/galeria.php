<?php
require_once '../fragmentos/fragmentos.php';

require_once '../../servico/PagamentoService.php';
require_once '../../servico/UsuarioService.php';

require_once '../../modelo/Pagamento.php';
require_once '../../modelo/Usuario.php';

imprimirHeader();
?>

<div class="container">
    <h1>Pagamentos</h1>

    <div class="table-responsive" style="margin-bottom: 100px">
        <table class="table table-red">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Data Pagamento</th>
                    <th>Vencimento</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pagamentos = buscarTodosPagamentos();
                if ($pagamentos) {
                    foreach ($pagamentos as $pagamento) {

                        $dataPagamento = $pagamento->getDataPagamento();
                        $dataVencimento = $pagamento->getVencimento();
                        $hoje = new DateTime();

                        if ($hoje > $dataVencimento) {
                            if (!$pagamento->getPagou()) {
                                $status = "Atrasado";
                            } else {
                                $status = "Pago";
                            }

                        } else if ($hoje >= $dataPagamento && $hoje <= $dataVencimento) {
                            $status = "Em dia";
                        }

                        $aluno = buscarUsuarioPorId($pagamento->getAluno());

                        ?>
                        <tr>


                            <!-- HTML -->
                            <td>
                                <img class="myImg" width="100px" height="100px"
                                    src="../../images/usuario/<?php echo $aluno->getFoto(); ?>" alt="">
                                <?php echo $aluno->getNome(); ?>
                            </td>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <span class="close">×</span>
                                <img class="modal-content" id="img01">
                                <div id="caption"></div>
                            </div>

                            <td>
                                <?php echo $pagamento->getDataPagamento()->format('d/m/Y'); ?>
                            </td>
                            <td>
                                <?php echo $pagamento->getVencimento()->format('d/m/Y'); ?>
                            </td>

                            <td>
                                <?php
                                switch ($status) {
                                    case "Atrasado":
                                        echo '<span class="btn btn-sm btn-danger">' . $status . '</span>';
                                        break;
                                    case "Em dia":
                                        echo '<span class="btn btn-sm btn-warning">' . $status . '</span>';
                                        break;
                                    default:
                                        echo '<span class="btn btn-sm btn-success">' . $status . '</span>';
                                }
                                ?>
                            </td>


                        </tr>
                    <?php }
                } else {
                    echo '<tr><td colspan="4">Nenhuma foto encontrada.</td></tr>';
                } ?>


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

            </tbody>
        </table>
    </div>
</div>
<?php
imprimirFooter();
?>