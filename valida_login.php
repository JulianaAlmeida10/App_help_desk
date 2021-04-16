<?php
    //inicialização de sessão
    session_start();
    

    #Recuperando dados do formulario de Login

    #relação de usuarios do sistema (seria BANCO DE DADOS)
    $usuarios = array(
        array('email' => 'julianadealmeida10@gmail.com', 'senha' => '1234567'),
        array('email' => 'xuxu@gmail.com', 'senha' => '1234'),
        array('email' => 'teste@teste.com', 'senha' => '123'),
        array('email' => 'admin@admin.com', 'senha' => 'admin')
    );

    //variavel que verifica se a autenticação foi realizada
    $usuario_autenticado = false;
    

    #percorrendo o array para verificar se (email e senha) são iguais aos recebidos no POST
    foreach($usuarios as $user){
        //condição que verifica se o usuario está registrado no sistema
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
        }

    }

    if ($usuario_autenticado == true) {
        # code...
        echo 'Usuario autenticado';
        //criando novo indice, no lado do servidor
        $_SESSION['autenticado'] = 'SIM';
        /* 
            se o usuario for SIM ele está autenticado
            e pode acessar as paginas do sistema
        */
        header('Location:home.php'); //está sendo forçado o redirecionamento para 'home.php'
    }else{
        $_SESSION['autenticado'] = 'NAO';
        /* 
            header  ->  força o redicionamento para onde (para pagina que quiser) vc quiser, ou seja,
            quando entrar nesta condição, o usuario sera redireciondo para o index, para fazer o login novamente
            ?login=erro   -> estou passando um parametro de erro no login
            */
        header('Location:index.php?login=erro');
    }

    /*
        //declarando e exibindo vetor $_POST, com indexs: email e senha
        echo $_POST['email'];
        echo '<br />';
        echo $_POST['senha'];
    */
?>