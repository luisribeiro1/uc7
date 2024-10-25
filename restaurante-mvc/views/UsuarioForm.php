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
                     <h4 class="my-0 fw-normal text-white">Editar usuario</h4>
                  </div>
                  <div class="card-body p-4">

                     


                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuario-adm/atualizar" value="<?= $idUsuario ?>">
                        <div class="form-floating mb-3">
                           <input type="nome" name="nome" id="nome" class="form-control" value="<?=$nome?>">
                           <label for="nome">Nome:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="usuario" name="usuario" id="usuario" class="form-control" value="<?=$usuario?>">
                           <label for="usuario">Usuário</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="password" name="senha" id="senha" class="form-control">
                           <label for="senha">Senha</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="nivelAcesso" name="nivelAcesso" id="nivelAcesso" class="form-control" value="<?=$nivelAcesso?>">
                           <label for="nivelAcesso">Nivel de usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                           <a href="[[base-url]]/usuario-adm">Criar conta nova</a>
                        </div>
                        <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Acessar</button>
                        <input type="hidden" name="acao" value="<?=$acao?>">
                        <input type="hidden" name="idUsuario" value="<?=$idUsuario?>">
                        

                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

</body>

</html>