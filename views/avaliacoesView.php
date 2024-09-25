<?php
$avaliacao = "";
# Iterar sobre array que foi criado com ocntroller e que contem os dados das mesas.
foreach($lista_de_avaliacoes as $avaliacoes){

    $idAvaliacao = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];

   # Cria os cards HTML com os dados das mesas.
    $avaliacao.= "
    <div class='card' style='width: 18rem;'>
        <h3 class='card-title'>$idAvaliacao</h3>
        <p >$nota</p>
        <div class='card-body'>
            <h3 class='card-title'>$nome</h3>
            <h6 class='card-title'>$email</h6>
            
          
        </div>
     </div>
    ";
    
}
# Faz a leitura dos arquivos de templates e armazena nas variáveis.

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");


# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $avaliacao, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;