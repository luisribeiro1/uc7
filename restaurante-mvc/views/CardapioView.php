<?php


$lista = "";
foreach ($lista_do_cardapio as $cardapio){
    $idCardapio =$cardapio["idCardapio"];
    $nome =$cardapio["nome"];
    $preco =$cardapio["preco"];
    $tipo =$cardapio["tipo"];
    $descricao =$cardapio["descricao"];
    $foto =$cardapio["foto"];
    $status =$cardapio["status"];


    $linkEditar = " <a class='text-primary text-decoration-none me-4'href='[[base-url]]/cardapio-adm/editar/$idCardapio'>
    <i class='bi bi-pencil-square'></i>Editar</a>";

    $linkExcluir = "  <a 
                class='text-danger text-decoration-none '
                href='[[base-url]]/cardapio-adm/excluir/$idCardapio'
                onclick=\"return confirm('Confirma a exclusão da mesa $idCardapio?')\"
                ><i class='bi bi-trash'></i>Excluir</a>";

    
    if($_SESSION["nivel_usuario"]==2){
        $linkExcluir ="";
    }elseif($_SESSION["nivel_usuario"]==3){
        $linkEditar = "";
        $linkExcluir = "";
    }


    $lista.= "
<div class='col-md-3 mb-4'>  
        <div class='card'>
            <img src='$foto' class='card-img-top'>
            <div class='card-body'>
                <strong>Prato: $idCardapio <br></strong>
                <div class='text-center'>

                     <tr>
                <th>$nome</th><br>
                <th>$preco</th><br>
                <th>$tipo</th><br>
                <th>$descricao</th><br>
                <th>$foto</th><br>
                <th>$status</th>
                 </tr>
            </div>

            </div>
              <div class='card-footer text-end'>
                $linkEditar
                $linkExcluir
            </div>
         </div>
    </div>
    ";
    
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;