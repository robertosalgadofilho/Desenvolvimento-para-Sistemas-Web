<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C4B2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="py-5 text-center">
            <h2>PHP + MySQL</h2>
            <p class="lead">Utilizando PHP para fazer consultas (select) </p>
        </div>

        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Título</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Ano publicação</th>                   
                </tr>
            </thead>
            <tbody>
                <?php 
                        require_once 'db.php';
                        
                        $conn = new mysqli($hn, $un, $pw, $db);
                        
                        if ($conn->connect_error) die("Não foi possível conectar.");
                       
                        $query = "select * from titulo";

                        $result = $conn->query($query);
                       
                        if (!$result) die("Erro de query");
                        
                        $rows = $result->num_rows;

                        for ($j = 0 ; $j < $rows ; ++$j)
                        {
                            $row = $result->fetch_array(MYSQLI_ASSOC);                      

                            echo '<tr>';
                            echo '<th scope="row">'.htmlspecialchars($row['codtitulo']).'</th>';
                            echo '<td>'.htmlspecialchars($row['autor']).'</td>';
                            echo '<td>'.htmlspecialchars($row['titulo']).'</td>';
                            echo '<td>'.htmlspecialchars($row['codgenero']).'</td>';
                            echo '<td>'.htmlspecialchars($row['ano']).'</td>';
                                                 
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