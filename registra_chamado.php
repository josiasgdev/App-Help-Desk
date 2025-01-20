<?php
session_start();

/*
O post é um array, o array recebido será formatado em um texto
para que possa ser escrito dentro do arquivo.

Os dados de cada campo do formulário recebidos através do método post serão separados
pelo caractere '#', e, serão alocados na variável registro como string, através do método implode.
*/
$registro = $_SESSION['id'] . '#' . implode('#', $_POST);
str_replace('#', '-', $registro);

/*Função nativa para abrir um novo arquivo. Caso o arquivo não exista, ele será criado
primeiro é passado o nome do arquivo, depois a ação que será tomada com o arquivo, ex: escrita(a)*/


$arquivo = fopen('arquivo.hd', 'a');

//Espera dois parâmetros: a referência do arquivo aberto, o que será escrito no arquivo.
//O PHP_EOL adiciona uma quebra de linha separando assim os chamados.
fwrite($arquivo, $registro . PHP_EOL);

//Fechar o arquivo.
fclose($arquivo);

echo $registro;

header('Location: abrir_chamado.php');
