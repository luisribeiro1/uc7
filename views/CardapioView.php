<?php 

$listaCardapio = "";
# Iterar sobre array que foi criado com ocntroller e que contem os dados das mesas.
foreach($lista_de_cardapio as $cardapio){

    $idCardapio = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio["preco"];
    $tipo = $cardapio["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];

    $cor = "bg-success";
    if($status == 0){
        $cor = "bg-danger";
    }

    # Cria os cards HTML com os dados das mesas.
    $listaCardapio.= "
    <table class='table'>
        <thead>
            <tr>
            <th >IdCardapio</th>
            <th >Nome</th>
            <th >preco</th>
            <th >tipo</th>
            <th >descrição</th>
            <th >Foto</th>
            <th >status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th >$idCardapio</th>
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
# Faz a leitura dos arquivos de templates e armazena nas variáveis.

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");


# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $listaCardapio, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;