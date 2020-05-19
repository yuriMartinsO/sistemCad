<?php
//Variáveis Iniciadas
$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : " "; 
?>
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="source/ACTION/Login.php">
                    <label style="color:red;"><?=$mensagem?></label>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de email</label>
                        <input name="email" type="email" class="form-control" id="emailLogin" aria-describedby="emailHelp" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senhaLogin" placeholder="Senha">
                    </div>
                    <button class="btn btn-primary" type="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>