<!-- CORPORAÇÃO (INCLUSÃO) DO script do 'validador_acesso.php' -->
<?php
    //incluir qualquer script que queira adicionar, uma unica vez.
    require_once("../back-end/validador_acesso.php");
?>

<?php
  /* Buscando os chamados registrados */

  //array que irá armazenar os registros de chamados recuperados
  $chamados = array();

  #ABRIR
    //fopen('nome do arquivo (arquivo.txt)', 'especificar o que vc ira fazer no arquivo (o parametro "r" indica que queremos apenas ler o arquivo)')
    //$arquivo esta recebendo a REFERENCIA do arquivo
    $arquivo = fopen('../back-end/arquivo.hd','r');

  
  #LER
  /*
    feof() -> testa pelo fim de um arquivo, percorre ate o fim. Quando chega no fim retorna TRUE. Logo como temos registros( de inicio retornaria FALSE) e para entrar no laço do 'while' tem que ser verdadeiro, então negamos !feof
  */
  //percorrendo cada linha (cursor) do arquivo, para recuperar os registros inseridos
  while(!feof($arquivo)){ 
    //Recuperando cada registro
    //fgets -> recupera tudo que estiver na linha(do cursor)
    $registro = fgets($arquivo);
    //inserindo cada registro dentro do array
    $chamados[] = $registro;
  }//enquanto houver registros (linhas)

  #FECHAR
  fclose($arquivo);

?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <!-- criando um link, na respectiva imagem para 'home.php' -->
      <a class="navbar-brand" href="../front-end/home.php">
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

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <!-- Produção dinamica de dos Cards -->
              <? foreach($chamados as $key => $itens_chamados) { ?>
              <!--percorrendo o array-->
                <?php
                    /**********************************************************
                      TRATAMENTO DE TEXTO:
                        No armazenamento dos dados o caracter "#" foi substituido por "-".
                        Logo na recuperação dos dados o processo inverso deve ser realizado. ( "-"  -> "#" ) 
                     
                      str_replace('parametro existente','será substituido por...', 'onde procurar')
                    *************************************************************/
                    str_replace('-','#', $chamados[$key]);
                    
                  //o array está recebendo a string, que tem os valores separados por '#'. Está transformando a string em vetor
                  $chamado_dados = explode('#', $itens_chamados);


                  #teste1: identificar se o perfil do usuario é adm ou user
                  if($_SESSION['perfil_id'] == 2){
                    //é usuario então tem filtro
                    #controle de visualização
                    //só vamos exibir o chamado, se ele foi criado pelo usuario
                    if($_SESSION['id'] != $chamado_dados[0]){
                      //se o id da pessoa logada, for diferente do id da pessoa que fez o chamado, as informações não devem ser exibidas(só para pessoa correspondente ao chamado)
                      continue;//o foreach se guira para prixima interação, desconsiderando toda a codificação que estiver após o continue
                    }
                    
                  }




                  //se o vetor não estiver preenchido(faltando ou vazio), ele pula(não exibe) o vetor e continua exibindo os demais
                  if(count($chamado_dados) < 3){
                    continue;
                  }
                ?>

                <!--
                  Dentro do laço, colocar o conteudo que sera criado varias vezes
                -->
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?=$chamado_dados[1]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$chamado_dados[2]?></h6>
                    <p class="card-text"><?=$chamado_dados[3]?></p>
                  </div>
                </div>
                <? } ?>


              <div class="row mt-5">
                <div class="col-6">
                  <!-- 'a' para o botão VOLTAR ser um link, assim podendo voltar para home.php -->
                  <a class="btn btn-lg btn-warning btn-block" href="../front-end/home.php" >Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>