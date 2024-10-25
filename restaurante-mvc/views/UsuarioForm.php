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
<header class="container-fluid bg-white shadow-sm">


<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container">
      <a class="navbar-brand fs-3 text-primary" href="#">Restaurante <span class="text-info fw-bold">MVC</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link" href="[[base-url]]/mesa-adm">Mesa</a>
          <a class="nav-link" href="[[base-url]]/cardapio-adm">Cardápio</a>
          <a class="nav-link" href="[[base-url]]/avaliacoes-adm">Avaliações</a>
          <a class="nav-link" href="[[base-url]]/usuario-adm">Usuario</a>
          <a class="nav-link text-end" href="sair">Sair</a>
        </div>
      </div>
    </div>
  </nav>
</header>

<body class="bg-secondary bg-opacity-10">

   <main>
      <div class="container mt-5">

         <div class="row d-flex justify-content-center">
            <div class="col-md-5">
            
               <div class="card mb-4 rounded-3 shadow-sm ">
                  <div class="card-header bg-secondary py-3">
                     <h4 class="my-0 fw-normal text-white">Usuario</h4>
                  </div>
                  <div class="card-body p-4">

                  

                     <p><small>Informe o usuário e senha para acessar</small></p>

                     <form id="form1" name="form1" method="post" action="<?= $baseUrl ?>/usuario-adm/atualizar">
                        <div class="form-floating mb-3">
                           <input type="usuario" name="usuario" id="usuario" class="form-control" value="<?= $usuario?>">
                           <label for="usuario">Usuário:</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="text" name="nome" id="nome" class="form-control" value="<?= $nome?>">
                           <label for="nome">Nome</label>
                        </div>
                        <div class="form-floating mb-3">
                           <input type="number" name="nivelAcesso" id="nivelAcesso" class="form-control" value="<?= $nivelAcesso?>">
                           <label for="nivelAcesso">NIvel de Usuário</label>
                        </div>
                        
                        <div class="text-end mb-2">
                           <a href="[[base-url]]/usuario-adm/criar">Criar novo usuario</a>
                        </div>
                        <button type="submit" id="btnAcessar" name="btnAcessar" class="w-100 btn btn-lg btn-primary">Acessar</button>
                        <input type='hidden' name='acao' value='<?= $acao?>'></input>
                        <input type='hidden' name='idUsuario' value='<?= $idUsuario?>'></input>

                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>

   </main>

</body>

</html>