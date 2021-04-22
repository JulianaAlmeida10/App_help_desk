<?php
    //inicialização de sessão
    session_start();
    

    #Recuperando dados do formulario de Login

    #relação de usuarios do sistema (seria BANCO DE DADOS)
    $usuarios = array(
        array('id' => 1, 'email' => 'adm@gmail.com', 'senha' => 'adm', 'perfil_id' => 1),
        array('id' => 2,'email' => 'teste@gmail.com', 'senha' => 'adm', 'perfil_id' => 1),
        array('id' => 3,'email' => 'jose@gmail.com', 'senha' => 'user', 'perfil_id' => 2),
        array('id' => 4,'email' => 'maria@gmail.com', 'senha' => 'user', 'perfil_id' => 2)
    );

    //variavel que verifica se a autenticação foi realizada
    $usuario_autenticado = false;
    //variavel do identificador de usuario
    $usuario_id = null;
    //variavel que identifica se é usuario(2) ou administrador(1)
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    

    #percorrendo o array para verificar se (email e senha) são iguais aos recebidos no POST
    foreach($usuarios as $user){
        //condição que verifica se o usuario está registrado no sistema
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            //$usuario_id está recebendo o 'id' de quem está logando
            $usuario_id = $user['id'];
            //$usuario_perfil_id recebe se quem logou é usuario(2) ou adm(1)
            $usuario_perfil_id = $user['perfil_id'];
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
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location:../front-end/home.php'); //está sendo forçado o redirecionamento para 'home.php'
    }else{
        $_SESSION['autenticado'] = 'NAO';
        /* 
            header  ->  força o redicionamento para onde (para pagina que quiser) vc quiser, ou seja,
            quando entrar nesta condição, o usuario sera redireciondo para o index, para fazer o login novamente
            ?login=erro   -> estou passando um parametro de erro no login
            */
        header('Location:../front-end/index.php?login=erro');
    }

    /*
        //declarando e exibindo vetor $_POST, com indexs: email e senha
        echo $_POST['email'];
        echo '<br />';
        echo $_POST['senha'];
    */
?>