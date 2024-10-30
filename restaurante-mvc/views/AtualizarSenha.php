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
        <span class="fs-4"><span class="text-primary"><i class="bi bi-pencil-square"></i></span><strong> Atualização de senha</strong></span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/usuario-adm" class="btn btn-sm btn-primary btns"><b><i class="bi bi-arrow-left me-1"></i></b>VOLTAR</a>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6">

        <form action="<?= $baseUrl ?>/usuario-adm/atualizarSenha" method="post">

          <label for="senha">Senha:</label>
          <input class="form-control" type="password" name="senha" id="senha">
          <br>

          <button class="btn btn-primary mt-3" type="submit">Salvar alterações</button>

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