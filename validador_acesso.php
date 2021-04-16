<?php
    //inicialização de sessão
    session_start();

    /* 
      isset()  => verifica que se existe o indice
      se não existir o indice   ou
      o valor da 'autenticacao' for diferente de sim
      o redicionamento é forçado
    */
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
      # code...
      /* 
            header  ->  força o redicionamento para onde (para pagina que quiser) vc quiser, ou seja,
            quando entrar nesta condição, o usuario sera redireciondo para o index, para fazer o login novamente
            ?login=erro   -> estou passando um parametro de erro no login
            */
            header('Location:index.php?login=erro2');
    }
?>