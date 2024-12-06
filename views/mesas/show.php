<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Mesa</title>
</head>
<body>
    <h1>Detalhes da Mesa</h1>
    <p><strong>Número:</strong> <?= $mesa['numero'] ?></p>
    <p><strong>Capacidade:</strong> <?= $mesa['capacidade'] ?></p>
    <p><strong>Estilo:</strong> <?= $mesa['estilo'] ?></p>
    <a href="/mesa/index">Voltar</a>
</body>
</html>
