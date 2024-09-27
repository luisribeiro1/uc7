<?php

$lista = "";

# Interar sobre o array que foi criado no controller que contem  os dados das avaliacoes
foreach ($lista_de_avaliacoes as $avaliacoes) {
    $idavaliacoes = $avaliacoes["idAvaliacao"];
    $nota=$avaliacoes["nota"];    
    $comentario=$avaliacoes["comentario"];    
    $data=$avaliacoes["data"];    
    $nome=$avaliacoes["nome"];    
    $email=$avaliacoes["email"];    
    $situacao=$avaliacoes["situacao"];  
    

    
    # Cria os Cards das avaliações 
    $lista.="
    <div class='col-md-3 mb-4'>
         <div class='card'>
             <div class='card-body'>
               <strong>avaliacoes: $idavaliacoes<br></strong>
                $nota, $comentario comentario,
                $data, $nome, $email, $situacao        
            </div>
            <div class='card-footer'>

                <a class='text-primary text-decoration-none me-4'                
                 href='#'><i class='bi bi-pencil-square'></i> Editar</a> 

                <a class='text-danger text-decoration-none'

                 href='[[base-url]]/avaliacoes-adm/excluir/$idavaliacoes'
                 onclick=\return confirm('Confirmar a exclusão de avaliaçoes $idavaliacoes?')\"
                 ><i class='bi bi-trash'></i> Excluir</a> 
            </div>

        </div>

    </div>    
    ";

}

# Faz a leitura dos arquivos de templates e armazena nas variáveis 
$header = file_get_contents("views/template/html/header.html");
$footer = file_get_contents("views/template/html/footer.html");
$html = file_get_contents("views/template/html/avaliacoeslist.html");

# subistituir a tag [[hader]] pelo conteudo da variavel $hesder. O mesno acontece
# com as demais variaveis
$html = str_replace("[[header]]",$header,$html);
$html = str_replace("[[footer]]",$footer,$html);
$html = str_replace("[[lista]]",$lista,$html);
$html = str_replace("[[base-url]]",$baseUrl,$html);

echo $html;