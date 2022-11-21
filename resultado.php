<?php
    require_once('classes/avaliacao.class.php');
    $id = isset($_GET['id'])?$_GET['id']:"";
    $idturma = isset($_GET['idturma'])?$_GET['idturma']:"";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <title>Gerar Gráficos</title>
</head>
<body>


<header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">HEALTHY IS COOL</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">

                        <li class="nav__item">
                        <a class="nav__link" href="">Avaliações</a>
                        </li>

                        <li class="nav__item">
                        <a class="nav__link" href="ADDdados.php?idaluno=<?php echo $id?>&idturma=<?php echo $idturma; ?>">Nova Avaliação</a>
                        </li>

                        <li class="nav__item">
                        <a class="nav__link active-link" href="avaliacoes.php?idaluno=<?php echo $id?>"> Gerar Gráficos</a>
                        </li> 

                        <li class="nav__item">
                            <a href="alunos.php?idturma=<?php echo $idturma; ?>" class="nav__link">Voltar</a>
                        </li>



                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                    </ul>
                </div>
            
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
                
            </nav>
        </header>

        <section class="home section" id="home" style="margin-top:8%;">
                

        
        <div class="table1" style="overflow-x:auto;" >
  <table class="footer section" >

 
    
            <tr>
                <th>Código</th>
                <th>Data</th>
                <th>Peso</th>
                <th>Altura</th>
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
        
        <br>
        <button id="grafico" value="iniciar">Iniciar gráficos</button>
    </div>
  

    
  
<br>


<div style="margin-top:-8%;">
    <center>
    <div style="float:left; width:30rem;" id="graph_column"></div>
    <div style="float:left; width:30rem;margin-left: 5%;" id="graph_line"></div>
    <div style="float:left; width:30rem; margin-left: 5%;" id="graph_div"></div>
    <script src="assets/js/graph.js" ></script>
    <script src="assets/js/grafico.js" ></script>



   
    
   </div>
   </center>
</section>



</main>



<!--=============== SCROLL UP ===============-->
<a href="#" class="scrollup" id="scroll-up">
<i class='bx bx-up-arrow-alt scrollup__icon'></i>
</a>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
</body>
</html>