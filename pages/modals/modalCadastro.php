<?php
    spl_autoload_register(function ($class_name) {
        include __DIR__ . '/../../source/CONTROLLER/' . $class_name . '.class.php';
    });
?>
<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirmar Senha</label>
                        <input type="password" class="form-control" name="senhaConf" id="senhaC" placeholder="Senha">
                    </div>
                </form>
                <button class="btn btn-primary" onclick="cadastrarUsuario()">CADASTRAR</button>
            </div>
        </div>
    </div>
</div>