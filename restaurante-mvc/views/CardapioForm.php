<?php

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>

<section class="container mt-4">
  <div class="row">
    <div class="col-md-6">
      <span class="fs-4"><i class="bi bi-grid-fill me-1"></i>Cadastro e edição de Cardápio</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/cardapio-adm" class="btn btn-primary btn-sm ">
        <i class="bi bi-arrow-left me-1"></i>Voltar

      </a>
      |
     
    </div>
  </div>
</section>

  <section class="container mt-4">
    <div class="row">
    <div class="col-md-6">
        <form action="<?= $baseUrl ?>/cardapio-adm/atualizar" method="post">
            <label>Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" require>
            <br>
            
            <label>Preço:</label>
            <input type="number" class="form-control" name="preco" id="preco" 
            require min="0" step="0.01">
            <br>

            <label>Tipo:</label>
            <select name="tipo" id="tipo" class="form-select">
                <?= $tipo ?>
            </select>
            <br>

            <label>Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
            <br>

            <label>Foto:</label>
            <input type="text" name="foto" id="foto" class="form-control">
            <br>
            
            <label>Status:</label>
            <input type="checkbox" name="status" id="status" class="form-check-input" value="1">
            <br><br>
            
            <button type="submit" class="btn btn-primary">Salvar alterações</button>

        </form>

    </div>
  </div>
  </section>
</main>

<?php

echo $footer;
?>



