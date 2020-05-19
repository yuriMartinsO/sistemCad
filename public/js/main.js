//variaveis globais
urlSite = document.location.origin;

usuario = "<script type='text/javascript' src='" + document.location.origin + "/public/js/usuario.js?v=5'></script>";
document.write(usuario);

function confirmarDesativacao(id,campo,url) {
    if(confirm("Deseja Desativar o " + campo + "? Ação irreversivel!!!")) {
        dominio = window.location.hostname;
        url = dominio + url;
        novaUrl = url + campo + ".php"+ "?id=" + id;
        window.location = "http://" + novaUrl;
    }
}

function mudarValorAddCampo(id) {
    $("#idgrupo").val(id);
}

// inicias imagens
$(function() {
    imgs = document.getElementsByTagName("img");
    for(i = 0; i < imgs.length; i++) {
        imgs[i].src = imgs[i].attributes.caminho.value;
    }
});