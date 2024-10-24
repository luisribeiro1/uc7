<?php
$lista='';

foreach($lista_usuario as $us){
    $idUsuario = $us['idUsuario'];
    $nome = $us['nome'];
    $usuario = $us['usuario'];
    $nivelAcesso = $us['nivelAcesso'];

    $lista.="
         <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <strong>Nome: $nome<br></strong>
                <strong>Usuario: $usuario<br></strong>
                <strong>Nivel de Acesso: $nivelAcesso<br></strong>
            </div>
            <div class='card-footer'>
                <a href='[[base-url]]/usuario/editar/$idUsuario'>Editar</a>
            </div>
        </div> 
    </div>
    ";

}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/usuarioList.html");

# substituir a tag [[header]] pelo conteúdo da variável $header
# o mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);  
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;