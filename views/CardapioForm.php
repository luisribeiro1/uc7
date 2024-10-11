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
      <span class="fs-4">Cadastro de um novo prato</span>
    </div>
    <div class="col-md-6 text-end">
      <a href="<?= $baseUrl ?>/cardapio-adm" class="btn btn-primary btn-md rounded-4">
        <i class="bi bi-arrow-left"></i>Voltar
      </a>
    </div>
  </div>
</section>
  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <form action="<?= $baseUrl ?>/cardapio-adm/atualizar/<?= $idCardapio ?>" method="post">
            <label for="nome">Nome: </label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" required>
            <br>

            <label for="preco">Preço: </label>
            <input type="number" class="form-control" name="preco" id="preco" require min="0" step="0.01" value="<?= $preco ?>"></input>
            <br>

            <label for="tipo">Tipo: </label>
            <select name="tipo" id="tipo" class="form-select">
                <?= $tipo ?>
            </select>
            <br>

            <label for="descricao">Descrição: </label>
            <textarea class="form-control" name="descricao" id="descricao"><?= $descricao ?></textarea>
            <br>

            <label for="foto">Foto: </label>
            <input type="text" class="form-control" name="foto" id="foto" value="<?= $foto ?>" required></input>
            <br>

            <label for="status">Status: </label>
            <input type="checkbox" class="form-check-input" name="status" id="status" value="1" <?= $status ?>></input>
            <br>
            
            <br>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            <input type="hidden" name="idCardapio" value="<?= $idCardapio ?>">
        </form>
      </div>
    </div>
  </section>
</main>

<?php
echo $footer;
?>