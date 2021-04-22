<!-- CORPORAÇÃO (INCLUSÃO) DO script do 'validador_acesso.php' -->
<?php
    //incluir qualquer script que queira adicionar, uma unica vez.
    require_once("../back-end/validador_acesso.php");

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="../imagens/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <!-- link SAIR -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../back-end/logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <!-- criando um link, na respectiva imagem -->
                  <a href="../front-end/abrir_chamado.php">
                    <img src="../imagens/formulario_abrir_chamado.png" width="70" height="70">
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="../front-end/consultar_chamado.php">
                    <img src="../imagens/formulario_consultar_chamado.png" width="70" height="70">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>