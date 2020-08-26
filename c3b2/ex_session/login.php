<html lang="pt-br">   
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <!--FORM -->
                        <form method="POST" action="valida.php">                            
                            <div class="form-group">
                                <label for="formGroupExampleInput">Seu email</label>
                                <input type="text" name="userLogin" class="form-control" id="formGroupExampleInput"
                                    placeholder="email@provedor.com" require>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Sua senha</label>
                                <input type="password" name="userPassword" class="form-control" id="formGroupExampleInput2"
                                    placeholder="Senha" require>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
                                Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>