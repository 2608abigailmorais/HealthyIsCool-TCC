<?php
    require_once('classes/avaliacao.class.php');
    $id = isset($_GET['id'])?$_GET['id']:"";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <title>Resultados</title>
</head>
<body>
    <div id='tabela'>   
        <h1>RESULTADOS</h1>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>DATA</th>
                <th>PESO</th>
                <th>ALTURA</th>
                <th>IMC</th>
            </tr>
        <?php
            $avaliacao = Avaliacao::lista(4,$id);
            // echo "<pre>";
            // var_dump($avaliacao);  
            // die;
            foreach ($avaliacao as $lista) {
                echo "<tr>
                        <td class='id'>". $lista['aluno_idaluno'] ."</td>
                        <td>". $lista['data'] ."</td>
                        <td>". $lista['peso'] ."</td>
                        <td>". $lista['altura'] ."</td>
                        <td>". $lista['imc'] ."</td>
                    </tr>";
            }
        ?> 
        </table>
    </div>
    <button id="grafico" value="iniciar">Iniciar gráficos</button>
    <div id="graph_column"></div>
    <div id="graph_line"></div>
    <div id="graph_div"></div>
    <script src="assets/js/graph.js" ></script>
    <script src="assets/js/grafico.js" ></script>
</body>
</html>