<?php


$lista = "";
foreach ($lista_cardapio as $cardapio){
    $idCardapio =$cardapio['idCardapio'];
    $nome =$cardapio['nome'];
    # number_format(valor, casas decimais, separador decimal, separador milhar)
    $preco = number_format($cardapio['preco'],2,",",".");
    $descricao =$cardapio['descricao'];
    $foto =$cardapio['foto'];


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
<div class='col-md-4 mb-4'>
    <div class='card shadow'>
        <img src='$foto' class='card-img-top'alt='...'>
        <div class='card-body'>
            Nome: <strong>$nome</strong>
            <br>
            Preço: <strong>$preco</strong>
            <br>
            Descrição: <strong>$descricao</strong>
            <br>
            <a href='[[base-url]]/avaliacoes/listar/$idCardapio'>Avaliações</a>
        </div>
    </div>
</div>
    ";
    
}

$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[titulo]]", "NOSSO CÁRDAPIO", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;