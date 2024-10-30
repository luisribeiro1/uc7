<?php

$opcao_senha = "
<label for=\"senha\" class=\"forn-senha\">Senha:</label>
<input type=\"text\" class=\"form-senha form-control\" name=\"senha\" id\"senha\"required</input>";

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
            
            <?= $opcao_senha ?>
            
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