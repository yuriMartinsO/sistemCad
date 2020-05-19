function cadastrarUsuario() {
    modalCadastro = $("#modalCadastro");
    email = modalCadastro.find("#email").val();
    senha = modalCadastro.find("input[name='senha']").val();
    senhaConf = modalCadastro.find("input[name='senhaConf']").val();

    if (senha != senhaConf) {
        alert("Senhas não conferem!!!");
        return false;
    }
    
    $.ajax({
          url : urlSite + "/source/ACTION/cadastrarUsuario.php",
          type : 'post',
          data : {
               email : email,
               senha : senha
          },
          success: function(data) {
            alert(data);
            }
     })
}