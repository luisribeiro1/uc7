<?php 

$formulario = "";

foreach($form_usuario as $form){

    $idUsuario = $form["idUsuario"];
    $nome = $form["nome"];
    $usuario = $form["usuario"];
    $nivelAcesso = $form["nivelAcesso"];
    
    $formulario.="
    <main>
        <div class='col-md-3 mb-4'>
            <div class='card'>
                    <div class='card-body'>
                        <strong>Id:</strong> $idUsuario<br>
                        <strong>Nome:</strong> $nome<br>
                        <strong>Usuario:</strong> $usuario<br>
                        <strong>Nivel de acesso: </strong>$nivelAcesso<br>
                        
                    </div>
              <div class='card-footer'>
                  <a  href='[[base-url]]/usuario/editar/$idUsuario'><i class='bi bi-pencil-square'></i>Editar</a>
              </div>           
            </div>
        </div>
   </main>
    ";
}

    $header = file_get_contents("views/templates/html/header.html");
    $footer = file_get_contents("views/templates/html/footer.html");
    $html = file_get_contents("views/templates/html/usuario.html");

    $html = str_replace("[[header]]",$header,$html);
    $html = str_replace("[[footer]]",$footer,$html);
    $html = str_replace("[[formulario]]",$formulario,$html);
    $html = str_replace("[[base-url]]",$baseUrl,$html);

    echo $html;