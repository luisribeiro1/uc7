<?php

$lista = "";

// Itera sobre o array de usuários
foreach ($lista_de_usuarios as $usuario) {
    $idUsuario = $usuario["idUsuario"];
    $nome = $usuario["nome"];
    $usuarioNome = $usuario["usuario"];
    $nivelUsuario = $usuario["nivelAcesso"];
    $nivel1 = "";
    $nivel2= "";
    $nivel3="";

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

    $lista .= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <strong>ID: $idUsuario<br></strong>
                Nome: $nome<br>
                Usuário: $usuarioNome<br>
                Nível: $nivelUsuario
            </div>
            <div class='card-footer'>
                <a class='text-primary me-2 text-decoration-none $nivel3'        
                 href='[[base-url]]/usuario/editar/$idUsuario'>
                 <i class='bi bi-pencil-square'></i> Editar</a>
                
                <a class='text-danger me-2 text-decoration-none $nivel2'
                 href='[[base-url]]/usuario/excluir/$idUsuario'
                 onclick=\"return confirm('Confirmar a exclusão do usuário $nome?')\">
                 <i class='bi bi-trash'></i> Excluir</a> 
            </div>
        </div>
    </div>    
    ";
}

$header = file_get_contents("views/template/html/header.html");
$footer = file_get_contents("views/template/html/footer.html");
$html = file_get_contents("views/template/html/usuarioList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;
