<?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados do cardapio.
foreach ($lista_de_cardapio as $cardapio){

    $id = $cardapio["idCardapio"];
    $nome = $cardapio["nome"];
    $preco = $cardapio ["preco"];
    $tipo = $cardapio ["tipo"];
    $descricao = $cardapio["descricao"];
    $foto = $cardapio["foto"];
    $status = $cardapio["status"];
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

    $status_form= "";
    $text_form = "";
    if($status <1){
        $status_form = "alert alert-danger px-0 py-0";
        $text_form = "text-decoration-line-through";
    }

     # Cria os cards HTML com os dados do cardapio.
    $lista.="
    <div class='col-md-3 mb-4'>
        <div class='card shadow $status_form'>
         <img src='$foto' 'class='card-img-top' alt=''>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <p class='$text_form'><strong>$id: $nome</strong></p>
                <hr>
            </div>
            <div class='d-flex justify-content-between $text_form'>
                $descricao
            </div>
                 <hr> 
            <div class='d-flex justify-content-between '>
               <span class='$text_form'> <strong>Tipo:</strong> $tipo</span>
               <span><strong>Preço:</strong> 
               <span class='text-success $text_form'><strong>R$$preco</strong></span></span>
            </div>
            </div>
            <div class='card-footer $nivel3'>
                <a class='text-primary text-decoration-none me-4' href='[[base-url]]/cardapio-adm/editar/$id'><i class='bi bi-pencil-square'>Editar</i></a>
                <a class='text-danger text-decoration-none $nivel2' href='[[base-url]]/cardapio-adm/excluir/$id'
                onclick=\"return confirm('Confirma a exclusão do item: $id?')\"'><i class='bi bi-trash'>Excluir</i></a>
            </div>
        </div>
    </div>";
  
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/cardapioList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;