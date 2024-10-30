<?php 

$formUsuario = "";

foreach ($form_usuario as $form) {
    $idUsuario = $form["idUsuario"];
    $nome = $form["nome"];
    $usuario = $form["usuario"];
    $senha = $form["senha"];
    $nivelAcesso = $form["nivelAcesso"];

    $formUsuario.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                ID: $idUsuario <br> 
                Nome: $nome <br>
                Usuário: $usuario <br>
                Acesso: $nivelAcesso
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none' href='[[base-url]]/usuario/editar/$idUsuario'><i class='bi bi-pencil-square'></i>Editar |</a>
                <a class='text-primary text-decoration-none' href='[[base-url]]/usuario/alterarSenha/$idUsuario'><i class='bi bi-pencil-square'></i>Editar Senha |</a>
                <a class='text-danger text-decoration-none' href='[[base-url]]/usuario/excluir/$idUsuario'><i class='bi bi-pencil-square'></i>Excluir</a>
            </div>
        </div>
    </div>
   "; 
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/usuarioView.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $formUsuario, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;