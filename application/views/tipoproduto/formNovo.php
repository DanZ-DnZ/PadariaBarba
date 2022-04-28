<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Adicionar novo tipo</h5>

                    <form method="Post" action="http://127.0.0.1/codeigniter/index.php/tipoproduto/novo">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Tipo produto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="nome" required />
                            </div>
                        </div>                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                            <a class="btn btn-secondary" href='http://127.0.0.1/codeigniter/index.php/tipoproduto'> Voltar/Cancelar</a>
                        </div>
                        <!--<input type="file" multiple name="arquivos">-->
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>