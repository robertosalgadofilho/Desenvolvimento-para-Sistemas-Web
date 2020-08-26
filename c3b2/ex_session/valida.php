<?php
    session_start(); //inicia a sessão

    $user = $_POST['userLogin']; // variaveis locais recebem o dado enviado
    $pass = $_POST['userPassword'];// variaveis locais recebem o dado enviado

    if($user == 'teste' && $pass == '123'){ //verificação do usário
        
        $_SESSION['userLog'] = $user; // cria a sessão do usuário específico
     
        header('Location: index.php'); //redireciona para a index

    } else {
        header('Location: login.php'); //se não for igual, redireciona para login
    }


?>