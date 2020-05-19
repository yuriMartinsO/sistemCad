<?php
class ArquivoController {
    public static function SalvarArquivos() {
        $ArquivosSalvos = [];
        foreach($_FILES as $chave => $valor) {
            if(isset($_FILES[$chave]) && $_FILES[$chave]['type'] != "") {
                $ext = strtolower(substr($_FILES[$chave]['name'],-4));
                $ext = ArquivoController::getTipoArquivo($ext);
                $new_name = ArquivoController::criarNome($ext);
                $dir = '../../arquivos/' . ArquivoController::prepararPasta() . "/"; 
                move_uploaded_file($_FILES[$chave]['tmp_name'], $dir.$new_name);
                $caminho = substr($dir.$new_name, 6);
                $ArquivosSalvos[$chave] = $caminho;
            }
        }

        return $ArquivosSalvos;
    }
    public static function prepararPasta() {
        $qtdArquivos = ArquivoController::contarArquivos(__DIR__ . "/../../arquivos/");
        $qtdArquivosUltimaPasta = ArquivoController::contarArquivos(__DIR__ . "/../../arquivos/" . $qtdArquivos);
        $qtdMaxArquivos = 50;
        $pasta = $qtdArquivos;

        if($qtdArquivosUltimaPasta >= $qtdMaxArquivos) {
            $pasta = $pasta+1;
            ArquivoController::criarPasta($pasta);
        }

        return strval($pasta);
    }
    public static function contarArquivos($diretorio) {
        $cont = 0;
        $diretorio = $diretorio;
        $ponteiro  = opendir($diretorio);
        while ($nome_itens = readdir($ponteiro)) {
            if (!(is_dir($nome_itens))){
                $cont++;
            }
        }
        return $cont;
    }


    public static function criarPasta($nome) {
        $folder = __DIR__."/../../arquivos/".$nome;
        mkdir ($folder, 0755);
    }

    public static function getTipoArquivo($ext) {
        $ext = strrev($ext);
        $tipoDeArquivo = "";
        
        foreach(str_split($ext) as $letra) {
            if($letra != ".") {
                $tipoDeArquivo .= $letra;
            } else if($letra == ".") {
                break;
            }
        }
        return strrev($tipoDeArquivo.".");
    }

    public static function criarNome($ext) {
        $arquivo = ArquivoController::prepararPasta();
        $nomeAleatorio = rand(0,9999999).rand(0,9999999).rand(0,9999999) . $ext;
        if(!file_exists(__DIR__."/../../arquivos/". $arquivo . "/" . $nomeAleatorio)) {
            return $nomeAleatorio;
        } else {
            return rand(0,9999999).rand(0,9999999).rand(0,9999999) . $ext;
        }
    }
}
?>