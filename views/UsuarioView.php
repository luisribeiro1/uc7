<?php

$lista = "";
foreach ($listaDeUsuarios as $item) {
    $nome = $item['nome'];
    $usuario = $item['usuario'];
    $nivelAcesso = $item['nivelAcesso'];
    $idUsuario = $item['idUsuario'];

    $lista .= "
    <div class='col-md-4 mb-4'>
        <div class='card shadow'>
            <div class='card-body'>
                Nome: <strong>$nome</strong>
                <br>
                Preço: <strong>$usuario</strong>
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none' href='usuario/editar/$idUsuario'><i class='bi bi-pencil-square'></i> Editar</a> 
                <a class='text-primary text-decoration-none ms-3' href='usuario/alterarSenha/$idUsuario'><i class='bi bi-pencil-square'></i> Alterar Senha</a> 
                <a 
                    class='btnExcluir text-danger text-decoration-none ms-3' 
                    href='usuario/excluir/$idUsuario'
                    onclick=\"return confirm('Confirma a exclusão deste usuário?')\"
                    >
                    <i class='bi bi-trash'></i> Excluir</a>
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