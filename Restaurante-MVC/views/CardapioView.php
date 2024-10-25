<?php

$lista = "";

# Interar sobre o array que foi criado no controller que contem  os dados do cardapio
foreach ($lista_de_cardapio as $cardapio) {
   $idcardapio= $cardapio["idcardapio"];    
    $nome=$cardapio["nome"];    
    $preco=$cardapio["preco"];    
    $tipo=$cardapio["tipo"];    
    $descricao=$cardapio["descricao"];    
    $foto=$cardapio["foto"];    
    $status=$cardapio["status"];

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

    # Cria os Cards dos cardapios 
    $lista.="
    <div class='col-md-3 mb-4'>
         <div class='card'>
             <div class='card-body'>
               <strong>cardapio: $idcardapio<br></strong>
               $nome, $preco preco,
               $descricao, $foto
               $tipo, $status 
                      
            </div>
            <div class='card-footer'>
               
                <a class='text-primary me-2 text-decoration-none'        
                 href='[[base-url]]/cardapio-adm/editar/$idcardapio'>
                 <i class='bi bi-pencil-square'></i> Editar</a>
                
                <a class='text-danger me-2 text-decoration-none'
                 href='[[base-url]]/cardapio-adm/excluir/$idcardapio'
                 onclick=\"return confirm('confirmar a exclusão do cardápio $idcardapio?')\"
                 ><i class='bi bi-trash'></i> Excluir</a> 
            </div>

        </div>

    </div>    
    ";

}

# Faz a leitura dos arquivos de templates e armazena nas variáveis 
$header = file_get_contents("views/template/html/header.html");
$footer = file_get_contents("views/template/html/footer.html");
$html = file_get_contents("views/template/html/cardapiolist.html");

# subistituir a tag [[hader]] pelo conteudo da variavel $hesder. O mesno acontece
# com as demais variaveis
$html = str_replace("[[header]]",$header,$html);
$html = str_replace("[[footer]]",$footer,$html);
$html = str_replace("[[lista]]",$lista,$html);
$html = str_replace("[[base-url]]",$baseUrl,$html);

echo $html;