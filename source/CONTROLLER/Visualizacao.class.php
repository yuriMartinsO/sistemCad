<?php
class Visualizacao {
    public static function listarGrupos($template = "listaGrupo") {
        global $QueryController;
        $grupoDAO = GrupoDAO::getInstance();
        $grupos = $grupoDAO->consultaPorIdUsuario($_SESSION['usuario']);

        if(!$grupos) {
            return false;
        }

        foreach($grupos as $grupo) {
            include Util::$caminhoVisualizacao . $template . ".php";
        }
    }

    public static function listarItensModal() {
        global $id;
        global $item;
        $array = json_decode($item->getDados(), true);
        $dadosItens = [];

        foreach ($array as $nome => $atributos) {
            $tipo = $atributos['tipo'];
            $valor = $atributos['valor'];

            $item = new DadosItem;
            $item->setNome($nome);
            $item->setTipo($tipo);
            $item->setValor($valor);
            
            $dadosItens[] = $item;
        }

        foreach ($dadosItens as $dadosItem) {  
            include Util::$caminhoVisualizacao . "pesquisarItem/campos/". $dadosItem->getTipo() . ".php";
        }
    }

    public static function listarItensPesquisa() {
        global $QueryController;
        $grupoId = isset($_GET["grupo"])?$_GET["grupo"]:null;
        $pesquisa = isset($_GET["pesquisa"])?$_GET["pesquisa"]:null;

        if(!$grupoId || !$pesquisa) {
            return false;
        }

        $pesquisa = explode(" ", $pesquisa);

        $itemDAO = ItemDAO::getInstance();
        $itens = $itemDAO->consultarPorPesquisa($grupoId,$pesquisa, " `nome`,`iditem` ");

        $final = count($itens);

        for ($i = 0; $i < $final; $i++) {
            $item = $itens[$i]; 
            include Util::$caminhoVisualizacao . "pesquisarItem/itemSelecionar" . ".php";
        }
    }
    
}
?>