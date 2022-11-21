<?php
    session_set_cookie_params(0);
    session_start();
    require_once "classes/avaliacao.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa5.php";
    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : 0; 
    $aluno_idaluno = isset($_GET["idaluno"]) ? $_GET["idaluno"] : ""; 
    $idturma = isset($_GET["idturma"]) ? $_GET["idturma"] : 0; 
    $title = "Dados | Aluno";



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title> <?php echo $title; ?> </title>   
</head>
<body>



<header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">HEALTHY IS COOL</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">

                        <li class="nav__item">
                        <a class="nav__link active-link" href="">Avaliações</a>
                        </li>

                        <li class="nav__item">
                        <a class="nav__link" href="ADDdados.php?idaluno=<?php echo $aluno_idaluno?>&idturma=<?php echo $idturma; ?>">Nova Avaliação</a>
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
        <section class="home section" id="home" style="margin-top:-5%;">
                <div class="home__container container grid">

        
 

        
          
                    

                    <div class="home__data">
                        
                        <h1 class="home__title">Dados Antropométricos</h1>
                        <p class="home__description" style="text-align: justify;">Veja os dados e gere os gráficos de peso, altura e Indice de Massa Corporal do aluno.</p>

                        </div>
<img src="assets/img/img2.png" alt="">
                    </div>   
                    </section>

     
                    <section class="home section" id="home">
                

                    <div class="table1" style="overflow-x:auto;" >
  <table class="footer section" >

        <tr>
            <th>Data</th>
            <th>Peso</th>
            <th>Altura</th>
        </tr> 
        <?php
        
            $lista = Avaliacao::listar2(1, $procurar, $aluno_idaluno);
            foreach ($lista as $linha) {

        ?>
        <tr>
            <td><?php echo $linha['data'];?></td>
            <td><?php echo $linha['peso'];?></td>
            <td><?php echo $linha['altura'];?></td>
        </tr>
        <?php } ?> 
    </table>
    <br>
   
    
    </div>
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