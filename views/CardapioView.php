<?php
$lista = "";
# iterar sobre o array que foi criado no controller e que contém os dados das mesas 
foreach($lista_cardapio as $cardapio){
    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

        $lista.="
      <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body text-center'>
                <strong>$nome<br></strong>
                 <strong>$preco</strong>
            <br><img src='$foto' class='w-100'>
                 </div>
                 <div class='card-body text-center'>
                    <strong>$descricao</strong>
                 </div>
            <div class='card-footer'>
                <a class='text-primary me-2 text-decoration-none'href='#'><i class='bi bi-pencil-square'></i>Editar</a>
                
                <a class='text-danger text-decoration-none'href='[[base-url]]/cardapio-adm/excluir/$idCardapio'onClick=\"return confirm('Confirma a exclusão do comentario $idCardapio?')\"><i class='bi bi-trash'></i>Excluir</a>
                
            </div>
        </div> 
    </div>
        ";
    
  
    
};



# Faz a leitura dos arquivos de templates e armazena nas variavéis 
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# substituir a tag [[header]] pelo conteúdo da variável $header
# o mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;

