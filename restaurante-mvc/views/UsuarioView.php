<?php


$lista = "";


# iterar sobre o array que foi criado no controller e que contem os dados das mesas
foreach ($lista_de_usuario as $usuarios){
    $idUsuario =$usuarios["idUsuario"];
    $nome =$usuarios["nome"];
    $usuario =$usuarios["usuario"];
    $senha =$usuarios["senha"];
    $nivelAcesso =$usuarios["nivelAcesso"];

    $linkEditar = "<a class='text-primary text-decoration-none me-4'href='[[base-url]]/usuario-adm/editar/$idUsuario'>
    <i class='bi bi-pencil-square'></i>Editar</a>";

    $linkExcluir="        <a 
                class='text-danger text-decoration-none'
                href='[[base-url]]/mesa-adm/excluir/$idUsuario'
                onclick=\"return confirm('Confirma a exclusão da mesa $idUsuario?')\"
                ><i class='bi bi-trash'></i>Excluir</a>
";

if(isset($_SESSION["nivel_usuario"])){

    if($_SESSION["nivel_usuario"]==2){
        $linkExcluir ="";
    }elseif($_SESSION["nivel_usuario"]==3){
        $linkEditar = "";
        $linkExcluir = "";
    }
}elseif(isset($_COOKIE["nivel_acesso"])){
    if($_COOKIE["nivel_acesso"]==2){
        $linkExcluir ="";
    }elseif($_COOKIE["nivel_acesso"]==3){
        $linkEditar = "";
        $linkExcluir = "";
    }
}





    # cria os cards HTML com os dados das mesas 
    $lista.= "
    <div class='col-md-3 mb-4'>  
        <div class='card'>
            <div class='card-body'>
                <strong>Usuario: $idUsuario <br></strong>
                $usuario <br> 
                 $nome  
            </div>
              <div class='card-footer'>
                $linkEditar
                $linkExcluir
            </div>
         </div>
    </div>
    ";
}

# faz a leitura dos arquivos do template e armazena nas variaveis 
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/usuarioList.html");

# substituir a tag [[header]] pelo conteudo da variavel $header. O mesmo acontece 
# com as demais variaveis 
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;