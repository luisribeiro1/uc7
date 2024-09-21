<?php 

$lista = "";
foreach($lista_de_avaliacoes as $avaliacoes) {
    $idAvaliacao = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];

    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                $idAvaliacao
                <strong>$nome</strong> <br>
                $email <br>
                $data <br>
                <i class='bi bi-star-fill'></i>$nota <br>
                $comentario <br>
                $situacao <br>
                $idCardapio <br>
            </div>
        </div>
    </div>
    ";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html;