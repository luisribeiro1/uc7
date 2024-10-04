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
        <div class='card shadow'>
         <img src='$foto' 'class='card-img-top' alt=''>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <strong>$id: $nome</strong>
                <hr>
            </div>
            <div class='d-flex justify-content-between'>
                $descricao
            </div>
                 <hr> 
            <div class='d-flex justify-content-between '>
               <span> <strong>Tipo:</strong> $tipo</span>
               <span><strong>Preço:</strong> 
               <span class='text-success'><strong>R$$preco</strong></span></span>
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