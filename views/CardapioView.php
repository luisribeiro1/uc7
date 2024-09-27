<?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados do cardapio.
foreach ($lista_de_cardapio as $cardapio){

    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio ["preco"];
    $tipo = $cardapio ["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

     # Cria os cards HTML com os dados do cardapio.
    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card'>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <strong>$id: $nome</strong> <p>$tipo </p> <br>
            </div>
            <div class='d-flex justify-content-between'>
                $descricao
            </div>
                 <hr> 
            <div class='d-flex justify-content-between '>
                Quantidade do Estoque: $status <span class='text-success'>Preço: $preco</span>
            </div>
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none me-4' href='#'><i class='bi bi-pencil-square'>Editar</i></a>
                <a class='text-danger text-decoration-none' href='[[base-url]]/cardapio-adm/excluir/$id'
                onclick=\"return confirm('Confirma a exclusão do item: $id?')\"'><i class='bi bi-trash'>Excluir</i></a>
            </div>
        </div>
    </div>";
  
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;