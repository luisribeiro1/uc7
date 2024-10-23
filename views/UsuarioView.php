<?php 

$formUsuario = "";

foreach ($form_usuario as $form) {
    $idUsuario = $form["idUsuario"];
    $nome = $form["nome"];
    $usuario = $form["usuario"];
    $senha = $form["senha"];

    $formUsuario.= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                $idUsuario
                <strong>$nome</strong><br>
                $usuario <br>
                $senha<br>
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