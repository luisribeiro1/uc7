<?php

$lista = "";

# iterar sobre o array que foi criado no controller e que contém os dados das mesas 
foreach($lista_de_mesas as $mesa){
    $id = $mesa["id"];
    $lugares = $mesa["lugares"];
    $tipo = $mesa["tipo"];

    $linkExcluir = "<a class='text-danger text-decoration-none'href='[[base-url]]/mesa-adm/excluir/$id'
    onClick=\"return confirm('Confirma a exclusão da mesa $id?')\"><i class='bi bi-trash'></i>Excluir</a>";
    $linkEditar = "<a class='text-primary me-2 text-decoration-none'href='[[base-url]]/mesa-adm/editar/$id'><i class='bi bi-pencil-square'></i>Editar</a>";
    # Cria os cards html com os dados das mesas 
        
        if(isset($_SESSION["nivel_acesso"])){
        if($_SESSION["nivel_acesso"] == 2){
            $linkExcluir = "";
        }elseif($_SESSION["nivel_acesso"] == 3){
            $linkExcluir = "";
            $linkEditar = "";
        }
    }elseif(isset($_COOKIE["nivelUsuario"])){
        if($_COOKIE["nivelUsuario"] == 2){
            $linkExcluir = "";
        }elseif($_COOKIE["nivelUsuario"] == 3){
            $linkExcluir = "";
            $linkEditar = "";
        }
    }
    
    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <strong>Mesa: $id<br></strong>
                 $tipo com $lugares lugares
            </div>
            <div class='card-footer'>
                $linkEditar
                $linkExcluir
            </div>
        </div> 
    </div>

    ";

}
# Faz a leitura dos arquivos de templates e armazena nas variavéis 
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");

# substituir a tag [[header]] pelo conteúdo da variável $header
# o mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);  
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;
