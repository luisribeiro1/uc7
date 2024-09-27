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
        <table class='bg-white table'>            
                <tr>
                    <td>$idCardapio</td>
                    <td>$nome</td>
                    <td>$preco</td>
                    <td>$tipo</td>
                    <td>$descricao</td>
                    <td>$status<a class='text-danger text-decoration-none' href='[[base-url]]/cardapio-adm/excluir/$idCardapio' onClick=\"return confirm('Confirma a exclusão do item $idCardapio?')\"><i class='bi bi-trash'></i>Excluir</a></td>
                </tr>
        </table>
        <button class='btn btn-primary w-25 '>$foto</button>
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

