<?php

# variável para incluir os códigos HTML da página
$lista = "";

if(isset($lista_de_pizzas)) {
  # iterar sobre o array $lista_de_pizzas que contém as informações das pizzas
  foreach ($lista_de_pizzas as $pizza) {
    $nome = $pizza['nome'];
    $preco = number_format($pizza['preco'],2,",",".");
    $imagem = $pizza['imagem'];
  
    # obter os itens dos ingredientes que estão em um array
    $lista_de_ingredientes = "";
  
    foreach ($pizza['ingredientes'] as $ingrediente) {
      $lista_de_ingredientes .= "<span class='badgee badge rounded-pill text-white bg-warning my-1 me-1'>$ingrediente</span>";
    }
  
    # criar a estrutura HTML
    $lista .="
      <div class='col-md-4 mb-4'>
        <div class='card shadow rounded-4'>
          <img src='$imagem' class='car-img-top' alt='$nome'>
          <div class='card-body'>
            Nome: <strong>$nome</strong></br>
            Preço: <strong class=>R$ $preco</strong></br>
            $lista_de_ingredientes </br>
  
  
            <p class='mt-3'>
              <a href='https://api.whatsapp.com/send/?phone=19988100801&text=Gostaria de pedir uma $nome' target='_blank' class='btn btn-sm btn-success rounded-4'>
                <i class='bi bi-whatsapp'>&nbsp;Pedir pelo Whatsapp</i>
              </a>
            </p>
  
          </div>
        </div>
      </div>  
    ";
  }
} else {
  $lista ="<div class='alert alert-danger'><i class='bi bi-exclamation-diamond-fill'></i> $erro</div>";
}

# faz a leitura dos arquivos de templates e armazena nas variáveis
$header = file_get_contents("views/templates/html/header_site.html");
$footer = file_get_contents("views/templates/html/footer.html");
$html = file_get_contents("views/templates/html/modeloSite.html");

# substituir a tag [[header]] pelo conteúdo da variável $header. O mesmo acontece com as demais.
$html = str_replace("[[header]]", $header, $html);
$html = str_replace("[[titulo]]", "<span class=''><img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAetJREFUWEftll9SwjAQxjfFg8ANtOMB4B50hFMIT8AT9RSWKfewvDvVG5iDaNdJrUwJm2Y35YFxzAsPbJNfvm//RMGVLXVlPPA3gO6n23Gl1HOjbvHzi4cyX2Z9FQ9SKE5SdBysAaCIEHev+2UDKkMUA8XJdgZwVKfrNF0NcPKeLQ0kewUApcaqGfMEDaiycv+4YcbLkzpO0g8AGHIPaOLYaokUEthF8bKghEAiu4KgpEAhdtlguswXI5flbKCm97wIc8cVnpX5Yk79yQaKp08rULi+EJCOEOdUr+IDhVWXkx8Bird8MbEDJECu7hwsWoQ4sVViAQWVO6q1aYi3s+0w+oweKLsplVhAd0n6ogDGbCkamHa841JnFccC6himJGM1wJE9w2qlvpRpGyfLts0LRN7MYwcFZCjIi1lqMoCs7syxg4pxtA07jzhAJ9XFtOM45buS+nfwtjt3JxBll8gOXhWcJLYHiBimAjsYPBoAN+2nrw+IaoYSO8iJbx5tEVQH0egIaoZuSepLuCDanzkVipP+bx8DUd1UO8m7ugso5O1TKyGF8Cokscv0EYWqkDzku5KdVMhjV62C2fRSEAyFzvKHnZSMUu8MIRVqBuEKUGlOZfSF8Cp0yQOke3lnmXTDvvH/QD4Fr06hb0YLKTQtQuxRAAAAAElFTkSuQmCC'/><span><span class='ms-2 fw-bold'>CARDÁPIO DE PIZZAS</span>", $html);
$html = str_replace("[[conteudo]]", $lista, $html);
$html = str_replace("[[footer]]", $footer, $html);
$html = str_replace("[[base-url]]", $baseUrl, $html);
$html = str_replace("[[js]]", "", $html);

echo $html;