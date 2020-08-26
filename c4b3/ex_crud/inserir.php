<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container">
    <div class="py-5">
        <h5>Cadastro</h5>
        <p class="card-text">      

        <form action="" method="post">
            <input type="text" class="form-control" name="autor" placeholder="Autor">
            <input type="text" class="form-control mt-1" name="titulo" placeholder="Título">

            <?php
                require_once 'db.php';
                $connection = new mysqli($hn, $un, $pw, $db);
                    
                if ($connection->connect_error) die ("Não foi possivel conectar");
                
                $query = 'select * from genero';
                $result = $connection->query($query);
                
                if (!$result) die ("Erro na query");

                $rows = $result->num_rows;

                echo '<select name="genero" class="form-control">';
                echo '<option value="0">-- Selecione o gênero --</option>';
                    for ($j = 0 ; $j < $rows ; ++$j)
                    {
                        $row = $result->fetch_array();
                        echo "<option value='".htmlspecialchars($row['codgenero'])."'>".htmlspecialchars($row['descricao'])."</option>";
                        
                    }
                echo '</select>';
            ?>         

            <input type="text" class="form-control mt-1" name="ano" placeholder="Ano">
            <button type="submit" name="enviar" class="btn btn-primary mt-1">Cadastrar</button>
        </form>
    </div>

    <?php

        if(isset($_POST['enviar'])){

            $autor = $_POST['autor'];
            $titulo = $_POST['titulo'];
            $genero = $_POST['genero'];
            $ano = $_POST['ano'];

            echo $genero;

            require_once 'db.php';
            $connection = new mysqli($hn, $un, $pw, $db);
                
            if ($connection->connect_error) die ("Não foi possivel conectar");
            
            $query = 'INSERT INTO titulo (autor, titulo, codgenero, ano) VALUES ("'.$autor.'","'.$titulo.'","'.$genero.'","'.$ano.'")';
            $result = $connection->query($query);
            
            if (!$result) die ("Erro na query");
            
            echo '<script> alert("Inserido com sucesso!"); location.href = ("index.php")</script>';

            $result->close();
            $conn->close();
         }
    ?>

</body>

</html>