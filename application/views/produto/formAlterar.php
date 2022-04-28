<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Alterar Produto</h5>

                    <form method="Post" action="http://127.0.0.1/codeigniter/index.php/produto/salvaralteracao">
                        <div class="row mb-3" hidden>
                            <label class="col-sm-2 col-form-label">id</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="id" value="<?php echo $produto->id; ?>" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Produto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="prdotuo" value="<?php echo $produto->produto; ?>" required />
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Perecível</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="perecivel" id="gridRadios1" value="1" checked="">
                                    <label class="form-check-label" for="gridRadios1">
                                        Sim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="perecivel" id="gridRadios2" value="0">
                                    <label class="form-check-label" for="gridRadios2">
                                        Não
                                    </label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Valor</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="valor" value="<?php echo $produto->valor; ?>" required />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tipo do Produto</label>
                            <div class="col-sm-10">
                                <select name="tipo_produto" class="form-select" required>
                                    <?php echo $opcoes; ?>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            <a class="btn btn-secondary" href='http://127.0.0.1/codeigniter/index.php/produto'> Voltar/Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>