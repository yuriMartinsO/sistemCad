<?php
abstract class DAO {
    abstract function listarValorAtributos($incluirId = false);

    abstract function listarNomeAtributos($incluirId = false);
}
?>