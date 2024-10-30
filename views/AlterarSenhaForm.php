<?php

$acao = "";

$opcao_senha = "
<label for=\"senha\" class=\"form-senha\">Senha:</label>
<input type=\"text\" class=\"form-senha form-control\" name=\"senha\" id=\"senha\" required></input> ";
if($acao=="editar") {
   $opcao_senha = "";
}

$header = file_get_contents("views/templates/html/header.html");
$footer = file_get_contents("views/templates/html/footer.html");
$header = str_replace("[[base-url]]", $baseUrl, $header);

echo $header;
?>

<!doctype html>
<html lang="en">
<head>
   <title>Restaurante MVC</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="[[base-url]]/views/templates/css/style.css">
</head>

<body class="bg-secondary bg-opacity-10">

   <main>
      <div class="container mt-5">
         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <p class="text-center fs-3">Restaurante MVC</p>
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white">Usuário</h4>
                  </div>
                  <div class="card-body p-4">
                     <!-- <?= $erro ?> -->
                     <p><small>Informe a senha para ser alterada</small></p>
                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuario/atualizarSenha/<?= $idUsuario ?>">
                        <?= $opcao_senha ?>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

</body>

</html>