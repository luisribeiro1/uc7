<?php 

$lista = "";

foreach ($informacoes as $usuario){
    $idUsuario = $usuario["idUsuario"];
    $nome = $usuario["nome"];
    $nomeUsuario = $usuario["usuario"];
    $nivel1 = "";
    $nivel2= "";
    $nivel3= "";
}

if(isset($_SESSION["nivel_acesso"])){

    if($_SESSION["nivel_acesso"] == 3){
        $nivel3 = "d-none";
    } elseif($_SESSION["nivel_acesso"] == 2){
        $nivel2 = "d-none";
    }else{
        $nivel1;
    }
}else{
    if($_COOKIE["nivelAcesso"] == 3){
        $nivel3 = "d-none";
    }elseif($_COOKIE["nivelAcesso"] == 2){
        $nivel2 = "d-none";
    }else{
        $nivel1;
    }

$lista.="
<div class='col-md-3 mb-4'>
        <div class='card shadow'>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <strong>$idUsuario: $nome</strong> <p class='text-warning'> </p> <br>
            </div>
            <div class='card-footer $nivel3'>
                <a class='text-primary text-decoration-none me-4' href='[[base-url]]/avaliacoes-adm/editar/$idUsuario'><i class='bi bi-check2-square'> Aprovar</i></a>
            </div>
        </div>
    </div>";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/usuarioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;