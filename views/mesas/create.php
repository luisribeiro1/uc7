<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Mesa</title>
</head>
<body>
    <h1>Adicionar Nova Mesa</h1>
    <form action="/mesa/store" method="post">
        <label for="numero">Número:</label>
        <input type="text" name="numero" id="numero" required><br>
        <label for="capacidade">Capacidade:</label>
        <input type="text" name="capacidade" id="capacidade" required><br>
        <label for="estilo">Estilo:</label>
        <input type="text" name="estilo" id="estilo" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
