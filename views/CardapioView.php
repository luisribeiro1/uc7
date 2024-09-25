<?php
$lista = "";
# iterar sobre o array que foi criado no controller e que contém os dados das mesas 
foreach($lista_cardapio as $cardapio){
    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    # Cria o cardápio html com os dados dos pratos mesas 
    if($lista == ""){
        $lista.="
        <table class='table bg-white'>
            <thead>    
                <tr>
                    <th>Numero</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Foto</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>";
    }else{
        $lista.="
        <table class='table bg-white'>
            <tbody>
                <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$preco</td>
                    <td>$tipo</td>
                    <td>$descricao</td>
                    <td>$foto</td>
                    <td>$status</td>
                </tr>
            </tbody>
        </table>";
    }
  
    
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

