<div class="modal fade" id="modalAddCampo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=$urlAction?>cadastrarTipoCampo.php">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nome do Campo</label>
                        <input name="nomecampo" class="form-control" type="text" placeholder="Coloque aqui o nome do campo" id="exampleFormControlFile1" onkeyup="this.value=this.value.replace(/[' ']/g,'')">
                        <label for="tipocampo">Tipo do campo : </label>
                        <select id="tipocampo" name="tipocampo">
                            <option value="texto">Texto</option>
                            <option value="inteiro">Número inteiro</option>
                            <option value="quebrado">Número "quebrado"</option>
                            <option value="imagem">Imagem</option>
                            <option value="arquivo">Arquivo</option>
                            <option value="data">Data (dia/mês/ano)</option>
                            <option value="SimNao">Sim/Não</option>
                            <option value="cor">Cor</option>
                        </select>
                        <label class="w-100" for="form-check-container">O campo é obrigatorio? : </label>
                        <div class="form-check form-check-inline" id="form-check-container">
                            <input class="form-check-input" type="radio" name="obrigatorio" id="inlineRadio1" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">Sim</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="obrigatorio" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Não</label>
                        </div>
                        <input id="idgrupo" type="text" name="idgrupo" class="form-control" style="display:none" value="">
                    </div>
                    <button class="btn btn-primary" type="submit">ADICIONAR CAMPO</button>
                </form>
            </div>
        </div>
    </div>
</div>