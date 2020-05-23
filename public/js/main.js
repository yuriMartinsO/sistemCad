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

//Clique nos itens gera um modal
function executarModal() {

    setInterval(function(){ 
        if (!$('#exampleModalLong').hasClass("show") && !$("body").hasClass("modal-open")) {
            //remove o modal se não esiver sendo utilizado
            $("#modalItem").remove();
        }
    }, 500);

    $(document).on("click",".idItem",function() {
        $.ajax({
            url : urlSite + "/source/ACTION/mostrarModalItem.php",
            type : 'post',
            data : {
                id: $(this).attr("idItem")
            },
            success: function(data) {
                document.body.innerHTML+= data;
                $("#botaoModal").click();
                $(".input-campo-quebrado").maskMoney({decimal:",", thousands:"."});
            }
        });
    });
}

function confirmarExclusaoItem(id) {
    if(confirm("deseja realmente excluir o item?")) {
        $.ajax({
            url : urlSite + "/source/ACTION/excluirProduto.php",
            type : 'post',
            data : {
                id: id
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    }
}

$( document ).ready(function() {
    executarModal();
});