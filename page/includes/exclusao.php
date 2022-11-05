<section class="container contas">
    <h1>Excluir conta</h1>

    <form method="post">

        <div class="form-group mt-3">
            <p>Você deseja realmente excluir a conta <strong><?=$obConta->nome?></strong>?</p>
        </div>

        <div class="form-group mt-3 btns">
            <a href="./?page=contas">
                <input type="button" value="Cancelar" class="btn btn-success">
            </a>
            <input type="submit" class="btn btn-danger" value="Excluir" name="excluir">
        </div>

    </form>

</section>