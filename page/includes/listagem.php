<?php

$mensagem = "";
if (isset($_GET["status"])) {
    switch ($_GET["status"]) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
    }
}

$resultados = "";
foreach ($contas as $conta) {
    $resultados .= '<tr>
                        <td>' . $conta->id . '</td>
                        <td>' . $conta->nome . '</td>
                        <td>' . $conta->saldo . '</td>
                        <td>' . $conta->cartao . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($conta->data)) . '</td>
                        <td>
                            <a href="./?page=depositar&id=' . $conta->id . '">
                                <button type="button" class="btn btn-secondary">Depositar</button>
                            </a> 
                            <a href="./?page=sacar&id=' . $conta->id . '">
                                <button type="button" class="btn btn-secondary">Sacar</button>
                            </a> 
                            <a href="./?page=editar&id=' . $conta->id . '">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a> 
                            <a href="./?page=excluir&id=' . $conta->id . '">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>  
                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                    <td colspan="6" class="text-center">
                                                        Nenhuma vaga encontrada!
                                                    </td>
                                                   </tr>';
?>

<main class="container">

    <?= $mensagem ?>

    <section>
        <a href="./?page=cadastrar">
            <input type="button" value="Cadastrar" class="btn btn-success">
        </a>
    </section>

    <section>

        <table class="table mt-3">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Saldo</th>
                    <th>Cartão</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?= $resultados ?>
            </tbody>

        </table>

    </section>
</main>