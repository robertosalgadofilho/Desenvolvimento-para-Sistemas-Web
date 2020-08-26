<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C4B3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="py-5 text-center">
            <h2>PHP + MySQL</h2>
            <p class="lead">Utilizando PHP para fazer consultas (insert, update, delete, select) </p>
        </div>

        <a href="inserir.php" class="btn btn-success mb-1">Cadastrar</a>

        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Título</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Ano publicação</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                        require_once 'db.php';
                        
                        $conn = new mysqli($hn, $un, $pw, $db);
                        
                        if ($conn->connect_error) die("Não foi possivel conectar");
                       
                        $query = "SELECT 
                        t.codtitulo AS id, 
                        t.autor, t.titulo, 
                        g.descricao AS genero, 
                        t.ano 
                        FROM titulo t, genero g 
                        WHERE t.codgenero = g.codgenero 
                        order by t.codtitulo asc";
                        
                        $result = $conn->query($query);
                       
                        if (!$result) die("Erro na query");
                        
                        $rows = $result->num_rows;

                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                            $row = $result->fetch_array(MYSQLI_ASSOC);                      

                            echo '<tr>';
                            echo '<th scope="row">'.htmlspecialchars($row['id']).'</th>';
                            echo '<td>'.htmlspecialchars($row['autor']).'</td>';
                            echo '<td>'.htmlspecialchars($row['titulo']).'</td>';
                            echo '<td>'.htmlspecialchars($row['genero']).'</td>';
                            echo '<td>'.htmlspecialchars($row['ano']).'</td>';
                            echo '<td> 
                                    <a class="btn btn-warning" href="atualizar.php?id='.$row['id'].'"> Atualizar</a>
                                    <a class="btn btn-danger" href="deletar.php?id='.$row['id'].'"> Deletar</a>
                                </td>';
                            echo '</tr>';                      
                        }
                        $result->close();
                        $conn->close();
                    ?>
            </tbody>
        </table>
        <hr>       
    </div>
</body>

</html>