<section class="container contas">
    <h1><?=TITLE?></h1>

    <form method="post">

        <div class="form-group mt-3">
            <label>Nome do titular</label>
            <input type="text" class="form-control" name="nome" value="<?=$obConta->nome?>">
        </div>

        <div class="form-group mt-2">
            <div class="row">

                <div class="col-12 col-sm-6">
                    <label>Saldo inicial</label>
                    <input type="number" step="0.01" min="0.00" class="form-control" name="saldo" id="saldo" value="<?=$obConta->saldo?>" <?=$page == "editar" ? 'readonly' : ''?>>
                </div>

                <div class="col-12 col-sm-6">
                    <label>Cartão</label>
                    <select name="cartao" class="form-control">
                        <option value="0" <?=$page=="cadastrar" ? 'selected' : ''?> disabled>SELECIONE SEU CARTÃO...</option>
                        <option value="Padrão" <?=$obConta->cartao == "Padrão" ? 'selected' : ''?>>Padrão</option>
                        <option value="Premium" <?=$obConta->cartao == "Premium" ? 'selected' : ''?>>Premium</option>
                    </select>
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