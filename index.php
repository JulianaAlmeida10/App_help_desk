<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    
    <!-- cabeçalho -->
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">
      
      <!-- formulario de login-->
        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <!-- 
                action  ->  destino do submit de um formulario (pra onde o formulario será submetido)
              -->
              <form action="valida_login.php" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <!-- Inicio codigo PHP -->
                <?php
                    /* 
                    isset()  -> função que verifica se um determinado indice, de um determinado array
                    está setado
                    Com isso podemo verificar a existencia do indice antes de usado
                    */
                    #verifica se o indice 'login' esta setado dentro da variavel global $_GET,
                    #e se o indice procurado 'login' possui dentro dele o valor 'erro'
                    if (isset($_GET['login']) && $_GET['login'] == 'erro') {
                      # code...
                ?>
                  <div class="text-danger">
                      E-mail ou Senha invalido(s)
                  </div>
                <?php } ?> <!-- Fim codigo PHP -->

                <!-- Inicio codigo PHP -->
                <?php
                    /* 
                    isset()  -> função que verifica se um determinado indice, de um determinado array
                    está setado
                    Com isso podemo verificar a existencia do indice antes de usado
                    */
                    #verifica se o indice 'login' esta setado dentro da variavel global $_GET,
                    #e se o indice procurado 'login' possui dentro dele o valor 'erro'
                    if (isset($_GET['login']) && $_GET['login'] == 'erro2') {
                      # code...
                ?>
                  <div class="text-danger">
                      Faça Login antes de acessar as paginas protegidas
                  </div>
                <?php } ?> <!-- Fim codigo PHP -->


                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>