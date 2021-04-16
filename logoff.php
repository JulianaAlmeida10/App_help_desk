<?php 
    #iniciando a sessão
    session_start();

    #destruir a variavel de sessão (remover todos os indices ao mesmo tempo)
    session_destroy();
    //forçando o redirecionamento
    header('Location: index.php');

    
    /*
        //mostrando o que tem dentro de session
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        //remover indices do array de sessão (um há um)
            //unset()  -> espera que o array eo indice, que deve ser eliminados
            //unset($_SESSION['x']);  //NÃO TEREMOS ERRO: pois remove  o indice apenas se existir
        
        

        //destruir a variavel de sessão (remover todos os indices ao mesmo tempo)
        
            //session_destroy()  -> remove todos os indices, contidos dentro da super global session
        
        session_destroy(); //será destruida, porem somete em uma proxima requisição, não teremos mais acesso as variaveis de sessão.
        // por isso é comum forçar um redirecionamento


        //mostrando o que tem dentro de session
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';
    */

    

?>