<?php

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados das mesas.
//var_dump($lista_de_usuarios);

foreach ($lista_de_usuarios as $usuario) {
    
    $idUsuario = $usuario["idUsuario"];
    $nome = $usuario["nome"];
    $nome_usuario = $usuario["usuario"];
    $nivelAcesso = $usuario["nivelAcesso"];
    $nivel1 = "";
    $nivel2= "";
    $nivel3="";

    //echo gettype($nivelAcesso);

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

    
    # Cria os cards HTML com os dados dos usuários
    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card shadow'>
            <div class='card-body'>
                <strong>ID: $idUsuario</strong> <br>
                Nome: $nome <br>
                Usuário: $nome_usuario <br>
                <strong>Nível Acesso:</strong> $nivelAcesso
            </div>
            <div class='card-footer $nivel3'>
           <a class='text-primary text-decoration-none me-4' href='[[base-url]]/usuario/editar/$idUsuario'><i class='bi bi-pencil-square'>Editar</i></a>
             <a class='text-danger text-decoration-none $nivel2' href='[[base-url]]/usuario/excluir/$idUsuario'
            onclick=\"return confirm('Confirma a exclusão do usuário $idUsuario?')\"
             ><i class='bi bi-trash'>Excluir</i></a>
            </div>
            </div>
            </div>
            ";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/usuarioList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;