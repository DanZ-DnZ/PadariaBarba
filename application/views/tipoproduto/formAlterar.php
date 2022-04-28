<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alterar Tipo produto</h5>

                    <form method="Post" action="http://127.0.0.1/codeigniter/index.php/tipoproduto/salvaralteracao">
                        <div class="row mb-3" hidden>
                            <label class="col-sm-2 col-form-label">id</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="id" value="<?php echo $tipoProduto->id; ?>"  />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="nome" value="<?php echo $tipoProduto->nome; ?>" required />
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            <a class="btn btn-secondary" href='http://127.0.0.1/codeigniter/index.php/tipoproduto'> Voltar/Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>