<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Mesa</title>
</head>
<body>
    <h1>Editar Mesa</h1>
    <form action="/mesa/update/<?= $mesa['numero'] ?>" method="post">
        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" value="<?= $mesa['numero'] ?>" readonly><br>
        <label for="capacidade">Capacidade:</label>
        <input type="text" name="capacidade" id="capacidade" value="<?= $mesa['capacidade'] ?>" required><br>
        <label for="estilo">Estilo:</label>
        <input type="text" name="estilo" id="estilo" value="<?= $mesa['estilo'] ?>" required><br>
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
