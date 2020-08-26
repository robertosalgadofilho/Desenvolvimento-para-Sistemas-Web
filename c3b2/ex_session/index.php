<?php 
 session_start(); //inicia a sessão
  if(!isset($_SESSION['userLog'])){ //verifica se a session existe
      header('location: login.php'); //se não existir redireciona para a página
  }    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto PHP</title>

    <!-- inclusão de css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="img/user.svg" alt="" width="72" height="72">
            <!--inclusão de trecho PHP no HTML -->
            <h2> Bem vindo, <?php echo $_SESSION['userLog']; ?> !</h2>
            <a href="sair.php">Voltar ao login</a>
        </div>
    </div>
    
</body>
</html>