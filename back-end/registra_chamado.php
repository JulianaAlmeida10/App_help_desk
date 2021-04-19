<?php
    #Recuperando as informações dos inputs do 'abrir_chamado.php'
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    /* TRABALHANDO NA MONTAGEM DO TEXTO**************************
        a separação da concatenação das string será sepadaras por #, logo tem que fazer um tratamento no back-end, que se um usuario digitar #, no momento da concatenaçã será convertida em '-'

        *Isso evita Bug

        str_replace('parametro existente','será substituido por...', 'onde procurar')
    *************************************************************/
    $titulo = str_replace('#','-', $_POST['titulo']);
    $categoria = str_replace('#','-', $_POST['categoria']);
    $descricao = str_replace('#','-', $_POST['descricao']);

    //texto que será armazenado dentro do arquivo.hd
    //OBS: este texto é uma string
    //PHP_EOL -> essa contante armazena o caracter de quebra de linha conforme o sistema operacional onde o php esta rodando
    $texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;


    #abrir
    //fopen('nome do arquivo (arquivo.txt)', 'especificar o que vc ira fazer no arquivo (o parametro "a" abre o aquivo para escrita)')
    //$arquivo esta recebendo a REFERENCIA do arquivo
    $arquivo = fopen('../back-end/arquivo.hd','a');

    #escrever
    //escrevendo o texto no arquivo
    /* 
        fwrite('referencia do arquivo que abrimos','(string) o que eu quero escrever , dentro do arquivo')
    */
    fwrite($arquivo, $texto);


    #fechar
    fclose($arquivo);


    header('Location: ../front-end/abrir_chamado.php');
?>