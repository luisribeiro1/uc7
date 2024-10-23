<!doctype html>
<html lang="pt-br">

<head>
   <title>Restaurante MVC</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="<?= $baseUrl ?>/views/templates/css/style.css">
</head>

<body class="bg-secondary bg-opacity-10">

   <main>
      <div class="container mt-5">

         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
               <p class="text-center fs-3"><b>Restaurante <span class="text-primary">MVC</span></b></p>
               <div class="card mb-4 rounded-3 shadow-sm my-4">
                  <div class="card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white fw-bolder"><i class="bi bi-door-open me-2"></i>Login</h4>
                  </div>
                  <div class="card-body p-4">

                     <?= $erro ?>

                     <p><small>Informe o usuário e senha para acessar</small></p>

                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/login/autenticar">
                        <div class="form-floating mb-4">
                           <input type="usuario" name="usuario" id="usuario" class="form-control">
                           <label for="usuario"><i class="bi bi-person"></i>&nbsp;Usuário:</label>
                        </div>
                        <div class="form-floating mb-4">
                           <input type="password" name="senha" id="senha" class="form-control">
                           <label for="senha"><i class="bi bi-key"></i>&nbsp;Senha</label>
                        </div>
                        <div class="form-floating mb-4">
                              <input type="checkbox" name="manter_logado" id="manter_logado" value="1" class="form-check-input">&nbsp;&nbsp;Manter logado
                        </div>
                        
                        <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Acessar<i class="bi bi-arrow-right ms-2"></i></button>
                        
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

</body>

</html>