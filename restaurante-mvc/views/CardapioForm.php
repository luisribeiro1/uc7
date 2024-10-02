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
        <span class="fs-4"><span class="text-primary"><i class="bi bi-pencil-square"></i></span><strong> Cadastro e edição do Cardápio</strong></span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?=$baseUrl?>/cardapio-adm" class="btn btn-sm btn-primary btns"><b><i class="bi bi-arrow-left me-1"></i></b>VOLTAR</a>
      </div>
    </div>

      <div class="row mt-4">

          <div class="col-md-6">
            <form action="<?= $baseUrl ?>/cardapio-adm/atualizar" method="post">
              <label for="nome">Nome:</label>
              <input class="form-control" type="text" name="nome" id="nome" require placeholder="Digite o nome do prato">
              <br>

              <label for="preo">Preço:</label>
              <input class="form-control" type="number" name="preco" id="preco" min="0" step="0.01" require placeholder="Valor do prato">
              <br>

              <label for="tipo">Tipo:</label>
              <select name="tipo" id="tipo" class="form-select">
                <?= $tipo ?>
              </select>
              <br>

              <label>Descrição:</label>
              <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição do item" require></textarea>
              <br>

              <label for="foto">Foto:</label>
              <input class="form-control" type="text" name="foto" id="foto">
              <br>

              <label for="status">Status:</label>
              <input class="form-check-input" value="1" type="checkbox" name="status" id="status" require>
              <br>

              <button class="btn btn-primary mt-3" type="submit">Salvar alterações</button>
              
            </form>
          </div>
        
    </div>
  </section>
</main>

<?php
echo $footer;
?>