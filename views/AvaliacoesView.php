<?php 

$lista = "";

# Iterar sobre array que foi criado com controller e que contém os dados das avaliações.
foreach($lista_de_avaliacoes as $avaliacoes) {
    $idAvaliacao = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];

    # Cria os cards HTML com os dados das avaliações.
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

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header, o mesmo acontece com as demais variáveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;