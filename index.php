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

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>

  <div class="container">
    <div class="row">

      <div class="card-login">
        <div class="card">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <!-- definir o destino das informações do formulário utilizando o atributo action
                e modificar o método de envio do formulário com o method post, 
                para anexar os dados do formulário dentro da requisição, retirando-as da url -->
            <form action="valida_login.php" method="post">
              <div class="form-group">
                <!-- O atributo name recebe os valores inseridos no campo e o dispara junto com a requisição-->
                <input name="email" type="email" class="form-control" placeholder="E-mail">
              </div>
              <div class="form-group">
                <input name="senha" type="password" class="form-control" placeholder="Senha">
              </div>

              <?php
              //isset trata a informação, verifica se o determinado índice de um determinado array está setado
              if (isset($_GET['login']) && $_GET['login'] == 'erro') { ?>
              
              <div class="text-danger">
                Usuário ou senha inválido(s)
              </div>

              <?php } ?>

              <!-- O submit do dispara as informações para a action -->
              <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</body>

</html>