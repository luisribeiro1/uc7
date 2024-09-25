<?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados das avaliacoes.
foreach ($lista_de_avaliacoes as $avaliacoes){
    $id = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];

     # Cria os cards HTML com os dados das avaliacoes.
    $lista.="
  <div class='col-md-3 mb-4'>
        <div class='card'>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <strong>$id: $nome</strong> <p> $data </p> <br>
            </div>
            <div class='d-flex justify-content-between'>
                $email  <span>Nota: $nota</span>
            </div>
                 <hr> 
                 $comentario
            <div class='d-flex justify-content-between mb-1'>
                 Pedido: $idCardapio <span>Veridito Final: $situacao</span>
            </div>
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none me-4' href='#'><i class='bi bi-pencil-square'>Editar</i></a>
                <a class='text-danger text-decoration-none' href='#'><i class='bi bi-trash'>Excluir</i></a>
            </div>
        </div>
    </div>";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;