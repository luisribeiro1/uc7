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
                     <h4 class="my-0 fw-normal text-white">Editar Usuario</h4>
                  </div>
                  <div class="card-body p-4">



                     <p><small>Informe o usuário e senha para acessar</small></p>

                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuario/atualizar/<?$idUsuario?>">
                        <div class="form-floating mb-3">
                           <input type="tex" name="nome" id="nome" class="form-control" value="<?=$nome?>">
                           <label for="nome">Nome:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" name="senha" id="senha" class="form-control" value="<?$senha?>">
                           <label for="senha">Senha</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="number" name="number" id="number" class="form-control" value="<?$senha?>">
                           <label for="number">Number</label>
                        </div>
                        <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Acessar</button>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

</body>

</html>