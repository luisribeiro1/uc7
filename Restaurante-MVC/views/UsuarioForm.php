<!doctype html>
<html lang="en">

<head>
    <title>Restaurante MVC - Usuário</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2><?= $acao == "criar" ? "Criar Usuário" : "Editar Usuário" ?></h2>
        <form method="post" action="<?= $baseUrl ?>/usuario/atualizar">
            <?php if ($acao == "editar"): ?>
                <input type="hidden" name="id" value="<?= $usuario["id"] ?>">
            <?php endif; ?>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $acao == 'editar' ? $usuario["nome"] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $acao == 'editar' ? $usuario["usuario"] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" <?= $acao == 'editar' ? '' : 'required' ?>>
            </div>
            <div class="mb-3">
                <label for="nivel_usuario" class="form-label">Nível de Acesso</label>
                <select class="form-select" id="nivel_usuario" name="nivel_usuario">
                    <option value="admin">Admin</option>
                    <option value="user">Usuário</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><?= $acao == "criar" ? "Criar" : "Atualizar" ?></button>
        </form>
    </div>
</body>

</html>
