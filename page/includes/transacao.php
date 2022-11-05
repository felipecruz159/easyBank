<section class="container contas">
    <h1><?=TITLE?></h1>

    <form method="post">

        <div class="form-group mt-3">
            <label>Nome do titular</label>
            <input type="text" class="form-control" name="nome" value="<?=$obConta->nome?>" readonly>
        </div>

        <div class="form-group mt-2">
            <div class="row">

                <div class="col-12 col-sm-6">
                    <label>Saldo</label>
                    <input type="number" step="0.01" min="0.00" class="form-control" name="saldo" id="saldo" value="<?=$obConta->saldo?>" readonly>
                </div>

                <div class="col-12 col-sm-6">
                    <label>Valor</label>
                    <input type="number" step="0.01" min="0.00" class="form-control" name="valor" id="valor" value="">

                </div>

            </div>

        </div>

        <div class="form-group mt-3 btns">
            <a href="./?page=contas">
                <input type="button" value="Voltar" class="btn btn-danger">
            </a>
            <input type="submit" class="btn btn-success" value="Enviar" name="envio">
        </div>

    </form>

</section>