<?php
require_once '../fragmentos/fragmentos.php';


require_once '../../servico/UsuarioService.php';


require_once '../../modelo/Usuario.php';

imprimirHeader();
?>

<div class="container">
    <h1>Alunos</h1>

    <a href="cadastrar-editar-visualizar.php?cadastrar=true" class="btn btn-dark mt-3 mb-3">Cadastrar</a>

    <div class="search-wrapper">
        <input class="form-control" type="text" id="searchInput" placeholder="Buscar Aluno por Nome">
    </div>


    <div class="table-responsive" style="margin-bottom: 100px">
        <table id="tabelaAlunos" class="table table-red">
            <thead>
                <tr>
                    <th>Aluno</th>
                    <th>Nome</th>
                    <th>Pagamento Atual</th>
                    <th>Status</th>
                    <th>Mensalidades Pagas</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>


<script>
    $(document).ready(function () {
        $.ajax({
            url: "../ajax/buscar_alunos.php",
            method: "POST",
            data: { " ": " " },
            success: function (data) {
                $('#tabelaAlunos tbody').html(data);
            }
        });
        $('#searchInput').on('keyup', function () {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "../ajax/buscar_alunos.php",
                    method: "POST",
                    data: { query: query },
                    success: function (data) {
                        $('#tabelaAlunos tbody').html(data);
                    }
                });
            }
        });
    });

</script>




<?php
imprimirFooter();
?>