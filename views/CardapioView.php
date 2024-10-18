<?php

$lista="";


foreach ($lista_cardapio as $cardapio) {
    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    # Cria os cards HTML com os dados dos cardápios
    $lista .= "
       
          <div class='card mb-3'>
            <div class='row g-0'>
              <div class='col-md-4 mt-2'>
                <img src='$foto' class='img-fluid rounded-start'>
              </div>
              <div class='col-md-8'>
                <div class='card-body'>
                  <h5 class='card-title'>$idCardapio - $nome</h5>
                  <br><br>
                  <p class='card-text'>Preço: <b>$preco</b></p>
                  <p class='card-text'><small class='text-body-secondary'>$descricao</small></p>
                </div>
              </div>
              <br>
              <div class='card-footer'>
                <a class='text-primary text-decoration-none me-2' href='[[base-url]]/cardapio-adm/editar/$idCardapio'>
                <i class='bi bi-pencil-square'></i> Editar</a>
                <a 
                class='text-danger text-decoration-none' 
                href='[[base-url]]/cardapio-adm/excluir/$idCardapio'
                onclick=\"return confirm('Confirma a exclusão do item $idCardapio do Cardápio?')\"
                ><i class='bi bi-trash'></i> Excluir</a>
              </div>
            </div>
          </div>";
}

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;