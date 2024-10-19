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
               <p class="fs-3 text-primary text-center">Restaurante <span class="text-info fw-bold">MVC</span></p>
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-primary py-3">
                     <h4 class="my-0 fw-normal text-white"> <i class="bi bi-door-open"></i> Login</h4>
                  </div>
                  <div class="card-body p-4">

                     <?= $erro ?>

                     <p><small>Informe o usuário e senha para acessar</small></p>

                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/login/autenticar">
                        <div class="form-floating mb-3">
                           <input type="usuario" name="usuario" id="usuario" class="form-control">
                           <label for="usuario"><i class="bi bi-person-fill"></i> Usuário:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" name="senha" id="senha" class="form-control">
                           <label for="senha"><i class="bi bi-person-fill-lock"></i> Senha:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="checkbox" name="manter_logado" id="manter_logado" value="1" class="form-check-input"> Manter logado
                        </div>
                        <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Acessar <i class="bi bi-box-arrow-in-right"></i></button>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

</body>

</html>