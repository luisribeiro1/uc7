<?php

$opcao_senha = "
<label for=\"senha\" class=\"form-senha\">Senha:</label>
<input type=\"text\" class=\"form-senha form-control\" name=\"senha\" id=\"senha\" required><br>";
if($acao=="editar"){
    $opcao_senha = "";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<main>
    <section class="container mt-4">
        <div class="row">
            <div class="col-6">
                <span class="fs-4 fw-bold text-primary"><i class="bi bi-grid-fill"></i> Formulário de usuário</span>
            </div>
            <div class="col-6 text-end">
                <a class='btn btn-sm btn-primary' href='<?= $baseUrl ?>/usuario'><i class='bi bi-arrow-left'></i> VOLTAR</a> | 
            </div>
        </div>
    </section>
    <section class="container mt-3">
        <div class="row">
            <div class="col-md-6">

                <form action="<?= $baseUrl ?>/usuario/atualizar/<?= $idUsuario ?>" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?= $nome ?>" required><br>

                    <label for="nome">Usuário:</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" value="<?= $usuario ?>" required><br>

                    <?= $opcao_senha ?>

                    <label for="nivelAcesso">Nível de acesso:</label>
                    <input type="number" class="form-control" name="nivelAcesso" id="nivelAcesso" value="<?= $nivelAcesso ?>" required min="0" max="3"><br>

                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    <input type="hidden" id="acao" name="acao" value="<?= $acao ?>">
                    <input type="hidden" id="idCardapio" name="idCardapio" value="<?= $idUsuario ?>">
                </form>

            </div>
        </div>
    </section>
</main>

<?php
echo $footer;
?>