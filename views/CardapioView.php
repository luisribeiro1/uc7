<?php
$lista = "";
foreach($lista_cardapio as $cardapio){
    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    if($lista == ""){
        $lista.="
        <div class='table bg-white'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PREÇO</th>
                    <th>TIPO</th>
                    <th>DESCRIÇÃO</th>
                    <th>FOTO</th>
                    <th>STATUS</th>
                </tr>
                </div>";
                
    }else{
        $lista.="
        <div class='table bg-white'>    
            <tr>
              <td>$id</td>
                    <td>$nome</td>
                    <td>$preco</td>
                    <td>$tipo</td>
                    <td>$descricao</td>
                    <td>$foto</td>
                    <td>$status</td>
            </tr>
        </div>
    ";


    }

    
};


$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);

echo $html;

