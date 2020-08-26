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
        <h5>Atualizar</h5>
        <p class="card-text">
        <form action="" method="post">
            <!-- traz a publicação baseada no ID passado pela URL -->
            <?php 
                require_once 'db.php';
                    
                    $conn = new mysqli($hn, $un, $pw, $db);
                    
                    if ($conn->connect_error) die("Não foi possível conectar");                                     
                  
                    $query = "SELECT t.codtitulo AS id, 
                            t.autor, t.titulo, 
                            g.descricao AS genero, 
                            t.ano 
                            FROM titulo t, genero g                          
                            WHERE t.codtitulo = ".$_GET['id']." and t.codgenero = g.codgenero";

                    $result = $conn->query($query); 
                     
                    if (!$result) die("Erro na query");
                    
                    $rows = $result->num_rows; 

                    for ($j = 0 ; $j < $rows ; ++$j)
                    {
                        $row = $result->fetch_array(MYSQLI_ASSOC);                      

                        echo '<input type="text" class="form-control" name="autor" placeholder="Autor" value="'.htmlspecialchars($row['autor']).'">';
                        echo '<input type="text" class="form-control mt-1" name="titulo" placeholder="Título" value="'.htmlspecialchars($row['titulo']).'">';
                
                            // Cria um campo de select para carregar todos os gêneros contidos no banco de dados
                            $querySelect = 'SELECT * FROM genero';

                            $resultSelect = $conn->query($querySelect);  

                            if (!$resultSelect) die ("Erro na query select");  

                            $rowsSelect = $resultSelect->num_rows;
            
                            echo '<select name="genero" class="form-control">';
                            echo '<option value="0">-- Selecione o gênero --</option>';
                                for ($j = 0 ; $j < $rowsSelect ; ++$j)
                                {
                                    $rowsSelect = $resultSelect->fetch_array();
                                    echo "<option value='".htmlspecialchars($rowsSelect['codgenero'])."'>".htmlspecialchars($rowsSelect['descricao'])."</option>";
                                }
                            echo '</select>';
                            //------------------------------------------------------------------------------------

                        echo '<input type="text" class="form-control mt-1" name="ano" placeholder="Ano" value="'.htmlspecialchars($row['ano']).'">';
                    }
                    $result->close();
                    $resultSelect->close();
                    $conn->close();
            ?>
            <button type="submit" name="enviar" class="btn btn-warning mt-1">Atualizar</button>
        </form>
    </div>


    <?php

        if(isset($_POST['enviar'])){

            $id = $_GET['id'];
            $autor = $_POST['autor'];
            $titulo = $_POST['titulo'];
            $genero = $_POST['genero'];
            $ano = $_POST['ano'];

            require_once 'db.php';
            $connection = new mysqli($hn, $un, $pw, $db);
                
            if ($connection->connect_error) die ("Não foi possível conectar");
            
            $query = 'UPDATE titulo SET autor="'.$autor.'", titulo="'.$titulo.'", codgenero="'.$genero.'", ano="'.$ano.'" WHERE  codtitulo='.$id;
            $result = $connection->query($query);
            
            if (!$result) die ("Erro na query");         

            echo '<script> alert("Atualizado com sucesso!"); location.href = ("index.php")</script>';

            $result->close();
            $conn->close();
         }
    ?>

</body>

</html>