<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante MVC- Pagina de erro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="[[base-url]]/views/templates/css/style.css"> 
    
</head>
<body>
    <div class=" container text-center mt-5">
        <div class="alert alert-danger ">
            <p class="fw-bold"><?=$mensagem?></p>
            <a href="javascript:history.back();">Clique aqui para voltar para o formulario</a>
        </div>
    </div>
    
</body>
</html>