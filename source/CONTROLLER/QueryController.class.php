<?php
class QueryController {
    private static $instance;
    public $conexao;

    function create($objDAO, $incluirId = false) {
        $nomeTabela = $objDAO->getTabela();
        $colunas = $objDAO->listarNomeAtributos($incluirId);
        $valores = $objDAO->listarValorAtributos($incluirId);

        $query = "insert into " . $nomeTabela . "(" . $colunas . ")" . "values (" . $valores . " )";
        return $this->conexao->query($query);
    }

    function read($nomeTabela,$where = "true",$campos = "*") {
        $query = "select " . $campos .  " from " . $nomeTabela  . " where " . $where;
        $dados = array();
        $cont = 0;
        $resultado = $this->conexao->query($query);

        if(!$resultado) {
            return false;
        }

        if ($resultado->num_rows > 0) {
            while($linha = $resultado->fetch_assoc()) {
                $dados[$cont] = $linha;
                $cont += 1;
            }
        }

        return $dados;
    }

    function update($objDAO,$coluna, $valor) {
        $nomeTabela = $objDAO->getTabela();
        $valores = $objDAO->listarNomeValor();

        $query = "update " . $nomeTabela . " set " . $valores . " where " . "`". $coluna ."` = '" . $valor . "'";
        return $this->conexao->query($query);
    }

    function deleteField() {
        $this->conexao->query($query);
    }

    function queryDireta($query) {
        $this->conexao->query($query);
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new QueryController;
        }

        return self::$instance;
    }

    //Encapsulamento

    function setConexao($conexao) {
        $this->conexao = $conexao->getConexao();
    }

    function getConexao() {
        return $this->conexao;
    }

}
?>