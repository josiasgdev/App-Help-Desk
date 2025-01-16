<?php 
    /*
    MÉTODO GET
    
    Super GLOBAL para receber/recuperar os dados enviados pela URL

    print_r($_GET);

    Essa super global é um array, cada parâmetro encaminhado na URL se transforma em um índice nesse respectivo array.

    echo '<br/>';
    echo $_GET['email];

    echo '<br/>';
    echo $_GET['senha];
    */

    /*
    MÉTODO POST

    Quando os dados são encaminhados via POST, é necessário mudar a forma de recebimento dessas informações
    print_r($_POST);

    echo '<br/>';
    echo $_POST['email'];

    echo '<br/>';
    echo $_POST['senha'];
    */

    //Instrução de inicialização de sessão
    session_start();



    //Variável que verifica se a autenticação foi realizada
    $usuario_autenticado = false;


    //Usuários do sistema

    //Criar uma relação(estática) de usuários da aplicação de forma manual
    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@tese.com.br', 'senha' => 'abcd')
    );

    /*Percorrer o array de arrays com os usuários, 
    testando a compatibilidade com os dados da superglobal POST recebida na submissão do formulário.
    */

    foreach($usuarios_app as $user){
        
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
        }

        echo '<hr>';
    }

    if($usuario_autenticado){
        echo 'Usuário autenticado';
        /*Criar um índice na variável de sessão para decidir
        se decidir se os demais scripts devem ser exibidos ou não */
        $_SESSION['autenticado'] = 'SIM';
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        //Força o redirecionamento de onde estiver para a página mencionada
        header('Location: index.php?login=erro');
    }
?>