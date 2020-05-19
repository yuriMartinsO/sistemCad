<div class="modal fade" id="modalAddGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=$urlAction?>cadastrarTipoGrupo.php">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nome do Grupo</label>
                        <input name="nomegrupo" class="form-control" type="text" placeholder="Coloque aqui o nome do grupo" id="exampleFormControlFile1" onkeyup="this.value=this.value.replace(/[' ']/g,'')">
                    </div>
                    <button class="btn btn-primary" type="submit">ADICIONAR GRUPO</button>
                </form>
            </div>
        </div>
    </div>
</div>  