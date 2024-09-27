<?php


$lista = "";
foreach ($lista_de_avaliacoes as $avaliacoes){
    $id =$avaliacoes["idAvaliacao"];
    $nota =$avaliacoes["nota"];
    $comentario =$avaliacoes["comentario"];
    $data =$avaliacoes["data"];
    $nome =$avaliacoes["nome"];
    $email =$avaliacoes["email"];
    $situacao =$avaliacoes["situacao"];
    $idCardapio =$avaliacoes["idCardapio"];

   


    $lista.= "
    <div class='col-md-3 mb-4'>  
        <div class='card'>
            <div class='card-body'>
                <strong> $id <br></strong>
              $nome
            </div>
              <div class='card-footer'>
                <a class='text-primary text-decoration-none me-4'href='#'><i class='bi bi-pencil-square'></i>Editar</a>

                <a 
                class='text-danger text-decoration-none'
                href='[[base-url]]/avaliacoes-adm/excluir/$id'
                onclick=\"return confirm('Confirma a exclusão da mesa $id?')\"
                ><i class='bi bi-trash'></i>Excluir</a>
            </div>
         </div>
    </div>
    
    ";

    
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacaoList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;