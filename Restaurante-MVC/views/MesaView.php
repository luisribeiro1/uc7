<?php

$lista = "";

# Interar sobre o array que foi criado no controller que contem  os dados das mesas
foreach ($lista_de_mesas as $mesa) {
    $id = $mesa["id"];
    $lugares = $mesa["lugares"];
    $tipo = $mesa["tipo"];

    # Cria os Cards das mesas
    $lista.="
    <div class='col-md-3 mb-4'>
         <div class='card'>
             <div class='card-body'>
               <strong>Mesa: $id<br></strong>
                $tipo com $lugares lugares        
            </div>            
            <div class='card-footer'>
                <a class='text-primary text-decoration-none me-4'
                 href='#'><i class='bi bi-pencil-square'></i> Editar</a> 
                 
                <a class='text-danger text-decoration-none'

                 href='[[base-url]]/mesa-adm/excluir/$id'
                onclick=\"return confirm('Confirma a exclusão da mesa $id?')\"
                ><i class='bi bi-trash'></i> Excluir</a> 
            </div>

        </div>

    </div>    
    ";

}

# Faz a leitura dos arquivos de templates e armazena nas variáveis  
$header = file_get_contents("views/template/html/header.html");
$footer = file_get_contents("views/template/html/footer.html");
$html = file_get_contents("views/template/html/mesalist.html");

# subistituir a tag [[hader]] pelo conteudo da variavel $hesder. O mesno acontece
# com as demais variaveis
$html = str_replace("[[header]]",$header,$html);
$html = str_replace("[[footer]]",$footer,$html);
$html = str_replace("[[lista]]",$lista,$html);
$html = str_replace("[[base-url]]",$baseUrl,$html);

echo $html;