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
        <span class="fs-4"><i class="bi bi-pencil-square"></i> Cadastro e edição de Usuários</span>
      </div>
      <div class="col-md-6 text-end">
        <a href="<?= $baseUrl ?>/mesa-adm" class="btn btn-primary btn-sm">
          <i class="bi bi-arrow-left"></i> Voltar</a>
      </div>
    </div>
  </section>

  <section class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        
        <form action="<?= $baseUrl ?>/usuario/atualizar/<?=$idUsuario ?>" method="post">
            
            <label>Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" require min="0" step="1" value="<?= $nome ?>">
            <br> 
            
            <label>Usuário:</label>
            <input type="text" class="form-control" name="usuario" id="usuario" require min="0" step="1" value="<?= $nome_usuario ?>">
            <br>

            <label>Nível Acesso:</label>
            <input type="number" class="form-control" name="nivelAcesso" id="nivelAcesso" require min="0" step="1" value="<?= $nivelAcesso ?>">
            <br>
            
            <br>

            <button type="submit" class="btn btn-primary">Salvar alterações</button>
            <input type="hidden" name="acao" value="<?= $acao ?>">
            
        </form>      

      </div>
    </div>
  </section>
</main>


<?php
echo $footer;
?>