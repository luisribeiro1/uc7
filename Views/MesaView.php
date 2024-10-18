<?php
#session_start(); // Iniciar a sessão para acessar os dados do usuário logado

// Verifica se o nível de acesso está na sessão, se não, define como o mais restrito (nível 3)
$nivelAcesso = isset($_SESSION['nivelAcesso']) ? $_SESSION['nivelAcesso'] : 3;

$lista = "";

# Iterar sobre o array que foi criado com controller e que contém os dados das mesas
foreach ($lista_de_mesas as $mesa) {
    $id = $mesa["id"];
    $lugares = $mesa["lugares"];
    $tipo = $mesa["tipo"];

    # Cria os cards HTML com os dados das mesas
    $lista .= "
    <div class='col-md-3 mb-4'>
        <div class='card'>
            <div class='card-body'>
                <strong>Mesa: $id </strong><br>
                $tipo com $lugares lugares
            </div>
            <div class='card-footer'>
    ";

    // Nível 1 (Global): pode editar e excluir
    if ($nivelAcesso == 1) {
        $lista .= "
            <a class='text-primary text-decoration-none me-2' href='[[base-url]]/mesa-adm/editar/{$mesa['id']}'><i class='bi bi-pencil-square'></i> Editar</a>
            <a class='text-danger text-decoration-none' href='[[base-url]]/mesa-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão da mesa $id?')\"><i class='bi bi-trash'></i> Excluir</a>
        ";
    }

    // Nível 2 (Restringido - Excluir): pode editar, mas não pode excluir
    elseif ($nivelAcesso == 2) {
        $lista .= "
            <a class='text-primary text-decoration-none me-2' href='[[base-url]]/mesa-adm/editar/{$mesa['id']}'><i class='bi bi-pencil-square'></i> Editar</a>
        ";
        // Não exibe o botão de excluir
    }

    // Nível 3 (Restringido - Editar e Excluir): não pode editar nem excluir
    elseif ($nivelAcesso == 3) {
        // Não exibe os botões de editar nem excluir
    }

    $lista .= "
            </div>
        </div>
    </div>
    ";
}

# Faz a leitura dos arquivos de templates e armazena nas variaveis
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/mesaList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece
# com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;