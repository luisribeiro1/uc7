<?php

$lista = "";
foreach ($avaliacoes as $avaliacao) {
    $idAvaliacao = $avaliacao['idAvaliacao'];
    $nota = $avaliacao['nota'];
    $comentario = $avaliacao['comentario'];
    $nome = $avaliacao['nome'];
    $email = $avaliacao['email'];
    $data = $avaliacao['data'];
    $lista .= "
    <div class='col-md-6 mb-4'>
        <div class='card shadow'>
            <div class='card-body'>
                Nota: <strong>$nota</strong><br>
                $comentario<br>
                Por: $nome ($email) em $data
            </div>
            <div class='card-footer'>
                <a class='text-primary text-decoration-none' href='avaliacoes/aprovar/$idAvaliacao'><i class='bi bi-pencil-square'></i> Aprovar</a> 
                <a 
                    class='btnExcluir text-danger text-decoration-none ms-3' 
                    href='avaliacoes/delete/$idAvaliacao'
                    onclick=\"return confirm('Confirma a exclusão desta avaliação?')\"
                    >
                    <i class='bi bi-trash'></i> Excluir</a>
            </div>
        </div>
    </div>";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;