<?php 

$lista = "";

# Iterar sobre array que foi criado com controller e que contém os dados do cardápio.
foreach($lista_de_cardapio as $cardapio) {
    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    # Cria os cards HTML com os dados dos cardápios.
    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                $id
                <strong>$nome</strong><br>
                $tipo <br>
                $descricao<br>
            </div>
            <div class='card-footer'>
                <button class='btn btn-primary'>R$ $preco</button>
            </div>
        </div>
    </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header, o mesmo acontece com as demais variáveis.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;