 <?php 

$lista = "";

# Iterar sobre o array  que foi criado no controller e que contém os dados das avaliacoes.
foreach ($lista_avaliacoes as $avaliacoes){
    $id = $avaliacoes["idAvaliacao"];
    $nota = $avaliacoes["nota"];
    $comentario = $avaliacoes["comentario"];
    $data = $avaliacoes["data"];
    $nome = $avaliacoes["nome"];
    $email = $avaliacoes["email"];
    $situacao = $avaliacoes["situacao"];
    $idCardapio = $avaliacoes["idCardapio"];
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

     $text_color = "";
     $text_color2 = "";
     $stars_form = "";

    switch ($nota){
        case "1":
            $stars_form = "<i class='bi bi-star-fill '></i>";
            break;
        case "2":
            $stars_form = "<i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i>";
            break;
        case "3":
            $stars_form = "<i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i>";
            break;
        case "4":
            $stars_form = "<i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i>";
            break;
        case "5":
            $stars_form = "<i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i> <i class='bi bi-star-fill'></i>";
    }

    if($situacao == "Aguardando"){
        $text_color2 = 'text-warning';
    }else{
        $text_color2 = "text-success";
    }

     # Cria os cards HTML com os dados das avaliacoes.
    $lista.="
  <div class='col-md-3 mb-4'>
        <div class='card shadow'>
        <div class='card-body'>
            <div class='d-flex justify-content-between'>
                <strong>$id: $nome</strong> <p class='text-warning'> $stars_form </p> <br>
            </div>
              <div class='d-flex justify-content-between'>
                $email
              </div>
              <hr class='mt-2 mb-2'>
              <div class='d-flex justify-content-between mt-2 mb-2'>
              $comentario - $nome
              </div>
              <hr class='mt-2 mb-2'>
            <div class='d-flex justify-content-between mt-2'>
                 <span><strong>Pedido:</strong> $idCardapio</span> 
                 <span><strong>Status Atual:<span class='$text_color2'> $situacao</strong></span></span>
            </div>
            </div>
            <div class='card-footer $nivel3'>
                <a class='text-primary text-decoration-none me-4' href='[[base-url]]/avaliacoes-adm/aprovar/$id'><i class='bi bi-check2-square'> Aprovar</i></a>
                <a class='text-danger text-decoration-none $nivel2' href='[[base-url]]/avaliacoes-adm/excluir/$id' onclick=\"return confirm('Confirma a exclusão da avaliação: $id?')\"><i class='bi bi-trash'> Excluir</i></a>
            </div>
        </div>
    </div>";
}

# Faz a leitura dos arquivos de templates e armazena nas variáveis.
$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/avaliacoesList.html");

# Substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais variáveis
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[lista]]", $lista, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);

echo $html;