<?php

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl,$header);

echo $header;
?>

<main>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <span class="fs-4"><i class="bi bi-grid-fill"></i>Cadastro e edicao de Cardapio</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl?> /cardapio-adm">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    
      
    </div>
  </section>


  <section class="container mt-3">
    <div class="row">
    <div class="col-md-6">

        <form action="<?= $baseUrl ?>/Cardapio-adm/atualizar" method= "post">
            <label>NOME:</label>
            <input type="text" class="form-control" name= "nome" id= "nome" require >
            <br>


            <label>PREÇO:</label>
            <input type="number" class="form-control" name= "preco" id= "preco" require 
            require min="0" step= "0.01">
            <br>

            <label>TIPO:</label>
            <select name="tipo" id="tipo" class= "form-select">
                <?= $tipo ?>
                </select>
            <br>

            <label>DESCRIÇÃO:</label>
            <textarea class= "form-control" name="descricao" id="descricao"></textarea>
            <br>

            <label>FOTO:</label>
            <input type="text" class="form-control" name= "foto" id= "foto" >
            <br>

            <label>STATUS:</label>
            <input type="checkbox" class="form-check-input" name= "status" id= "status" value= "1">
            <br><br>

            <button type= "submit" class= "btn btn-primary">Salvar Alterações</button>

    </form>
    </div>
    </div>
  </section>
</main>








<?php
echo $footer;
?>