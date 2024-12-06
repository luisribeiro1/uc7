<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Mesas</title>
</head>
<body>
    <h1>Lista de Mesas</h1>
    <a href="/mesa/create">Adicionar Mesa</a>
    <table>
        <thead>
            <tr>
                <th>Número</th>
                <th>Capacidade</th>
                <th>Estilo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mesas as $mesa): ?>
            <tr>
                <td><?= $mesa['numero'] ?></td>
                <td><?= $mesa['capacidade'] ?></td>
                <td><?= $mesa['estilo'] ?></td>
                <td>
                    <a href="mesa/show/<?= $mesa['numero'] ?>">Ver</a>
                    <a href="mesa/edit/<?= $mesa['numero'] ?>">Editar</a>
                    <a href="mesa/delete/<?= $mesa['numero'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta mesa?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
