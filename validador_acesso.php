<?php
session_start();
/*Verifica se o índice não existe(uso da negação(!) no isset)
  Verifica se o retorno de isset é false(a inversão da negação aciona a condicional e roda o bloco)
 ou diferente de 'SIM'*/
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
  //Força o redirecionamento de onde estiver para a página mencionada
  header('Location: index.php?login=erro2');
}
?>