<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante MVC | Erro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <p class="text-center fs-1 text-primary">Restaurante <span class="text-info fw-bold">MVC</span></p>
        <div class="alert alert-danger px-0">
            <h1><i class="bi bi-exclamation-triangle-fill text-danger"></i></h1>
            <p class="fw-bold"><?= $mensagem ?></p>
            <hr>
            <a href="javascript:history.back();" class="btn btn-danger"><i class='bi bi-arrow-left'></i> Voltar</a>
        </div>
    </div>
</body>
</html>