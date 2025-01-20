<?php require_once "validador_acesso.php"; ?>

<?php
//Armazenamento dos chamados
$chamados = array();

//abrir o arquivo.hd
$arquivo = fopen("arquivo.hd", "r");

/*feof testa pelo fim de um arquivo, a função retorna false enquanto não encontrar o final do arquivo, linha por linha, posicionando o curso no início da linha por isso é utlizada a negação lógica para que funcione como condicional do laço de repetição.*/
while (!feof($arquivo)) {
  /*fgets com base no documento aberto e na posição do cursor, recuperar o que estiver escrito até um determinado n° de bits ou até encontrar o final da linha(quebra de linha)*/
  $registro = fgets($arquivo);
 //Atribuindo cada arquivo lido e alocado em registro para um índice do array chamados
  $chamados[] = $registro;  
}
//fechar o arquivo
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
    <a class="navbar-brand" href="#">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
    <ul class="navbar-nav">
      <li class="navbar-item">
        <a class="nav-link" href="logoff.php">SAIR</a>
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
        
          <?php foreach($chamados as $chamado) { ?>
            
            <?php
            /*Lógica para criação dos elementos da view onde cada chamado criado será exibido, o laço percorre cada chamado recebido, cria os elementos e os preenche com os dados dos chamados.*/
              $chamado_dados = explode('#', $chamado);
              
              //Verificando se o identificador é de usuário
              if($_SESSION['perfil_id'] == 2){
                //Verifica, através do ID se o usuário logado é o mesmo usuário que abriu o chamado.
                if($_SESSION['id'] != $chamado_dados[0]){
                  //Caso entre neste laço, com o comando continue, a execução sai do bloco de código e nada mais é executado.
                  continue;
                }
              }

              //Contagem da quantidade de elementos do array chamado_dados. Se for inferior a 3, é sinal de que falta algum item e a instrução é pulada
              if(count($chamado_dados) < 3) {
                continue;
              }
            ?>
            <div class="card mb-3 bg-light">
              <div class="card-body">
                <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                <p class="card-text"><?= $chamado_dados[3] ?></p>

              </div>
            </div>

          <?php } ?>

            <div class="row mt-5">
              <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>