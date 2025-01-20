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
    $usario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1=> 'Administrador', 2 => 'Usuário');


    //Usuários do sistema

    //Criar uma relação(estática) de usuários da aplicação de forma manual
    $usuarios_app = array(
        array('id' => 1,'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2,'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 3,'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array( 'id' => 4,'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2)
    );

    /*Percorrer o array de arrays com os usuários, 
    testando a compatibilidade com os dados da superglobal POST recebida na submissão do formulário.
    */

    foreach($usuarios_app as $user){
        
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }

        echo '<hr>';
    }

    if($usuario_autenticado){
        echo 'Usuário autenticado';
        /*Criar um índice na variável de sessão para decidir
        se decidir se os demais scripts devem ser exibidos ou não */
        $_SESSION['autenticado'] = 'SIM';
        /*Lança o id do usuário na sessão global para identificação do registro */
        $_SESSION['id'] = $usuario_id;
        /*Lança a verificação da função do usuário*/
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        //Força o redirecionamento de onde estiver para a página mencionada
        header('Location: index.php?login=erro');
    }
?>