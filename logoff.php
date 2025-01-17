<?php 
    session_start();
    
   /*Remover índices do array de sessão
        unset()


    Destruir a variável de sessão
        session_destroy()
    Após o uso da session_destroy é necessário utilizar um redirecionamento para recarregar os scrips.
    Afinal, só não existirá acesso numa próxima requisição */

    session_destroy();
    header('Location: index.php');
?>