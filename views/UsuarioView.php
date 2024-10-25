<?php 

$lista = "";

foreach ($informacoes as $usuario){
    $idUsuario = $usuario["idUsuario"];
    $nome = $usuario["nome"];
    $nomeUsuario = $usuario["usuario"];
    $nivelAcesso = $usuario["nivelAcesso"];
    $nivel1 = "";
    $nivel2= "";
    $nivel3= "";

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
}

$lista.="
 <div class='col-md-3 mb-4'>
        <div class='card shadow'>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <strong>$idUsuario: $nome</strong><br>
            </div>
              <div class='d-flex justify-content-between'>
             <span><strong>Nome completo:</strong> $nomeUsuario</span>
              </div>
              <hr class='mt-2 mb-2'>
            <div class='d-flex justify-content-between mt-2'>
                 <span><strong>Nível de Acesso:</strong> $nivelAcesso</span> 
            </div>
            </div>
            <div class='card-footer $nivel3'>
                <a class='text-primary text-decoration-none me-4' href='[[base-url]]/usuario/editar/$idUsuario'><i class='bi bi-check2-square'> Editar</i></a>
                <a class='text-danger text-decoration-none $nivel2' href='[[base-url]]/usuario/excluir/$idUsuario' onclick=\"return confirm('Confirma a exclusão desse usuário: $idUsuario?')\"><i class='bi bi-trash'> Excluir</i></a>
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