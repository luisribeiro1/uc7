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

    $excluir = "<a class='text-danger text-decoration-none' href='[[base-url]]/cardapio-adm/excluir/$idCardapio' onclick=\"return confirm('Confirma a exclusão da mesa $idCardapio?')\"><i class='bi bi-trash'></i>Excluir</a>";
    $editar = "<a class='text-decoration-none' href='[[base-url]]/cardapio-adm/editar/$idCardapio' ><i class='bi bi-pencil-square'></i>Editar</a>";
    if($_SESSION["numero_usuario"] == 2){
    
        $excluir = "";
 
     }elseif($_SESSION["numero_usuario"] == 3){
         $excluir = "";
         $editar = "";
         
     }else {
         
     }
    # Cria os cards HTML com os dados das mesas.
    $listaCardapio.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
        <img src='$foto' class='card-img-top'>
            <div class='card-body'>
                $idCardapio
                <strong>$nome</strong><br>
                <br><p class='text-danger-emphasis'> $tipo </p>
                $descricao<br>
            </div>
            <div class='card-footer'>
            <button class='btn btn-primary'>R$ $preco</button>
                
                $editar
                $excluir
            </div>
        </div>
    </div>
   ";
    
}
# Faz a leitura dos arquivos de templates e armazena nas variáveis.

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer_site.html");
$html = file_get_contents("views/templates/html/cardapioList.html");


# Substituir a tag [[header]] pelo conteúdo da variavel $header. O mesmo acontece 
# com as demais variaves
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $listaCardapio, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);



echo $html;