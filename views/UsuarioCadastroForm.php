<!doctype html>
<html lang="pt-br">

<head>
   <title>Restaurante MVC</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="<?= $baseUrl ?>/views/templates/css/customizado.css">
</head>

<body class="bg-secondary bg-opacity-10">

   <main>
      <div class="container mt-5">

         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <p class="text-center fs-3 text-primary">Restaurante <span class="text-info fw-bold">MVC</span></p>
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white"><i class="bi bi-person-vcard"></i> <?= $acao ?> Usuario:</h4>
                  </div>
                  <div class="card-body p-4">

                     <!-- <?= $erro ?> -->

                     <p><small>Preencha o campo abaixo:</small></p>

                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuarios-adm/atualizar">
                        <div class="form-floating mb-3">
                           <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome ?>">
                           <label for="usuario"><i class="bi bi-person-fill"></i> Nome:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="usuario" id="usuario" class="form-control" value="<?= $nomeUsuario ?>">
                           <label for="usuario"><i class="bi bi-person-vcard-fill"></i> Usuário:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" name="senha" id="senha" class="form-control">
                           <label for="senha"><i class="bi bi-key-fill"></i> Senha:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="number" name="nivelAcesso" id="nivelAcesso" class="form-control" value="<?= $nivelAcesso ?>" min="1" max="3" step="1">
                           <label for="usuario"><i class="bi bi-shield-shaded"></i> Nivel de controle:</label>
                        </div>
                        <input type="hidden" name="acao" value="<?= $acao ?>">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="w-100 btn btn-lg btn-secondary">Editar <i class="bi bi-arrow-right"></i></button>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

</body>

</html>