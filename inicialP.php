<?php
    session_set_cookie_params(0);
    session_start();
    require_once "classes/turma.class.php";
    require_once  "conf/Conexao.php";
    // require_once  "processa3.php";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0; 
    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : ""; 
    $title = "Inicial | Professor";
    $idescola = isset($_GET["idescola"]) ? $_GET["idescola"] : 0;

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
                            <a href="inicialP.php" class="nav__link active-link">Página Inicial</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="turma.php?id=<?php echo $_SESSION['id_prof'];?>" class="nav__link">Nova Turma</a>
                        </li>

                        <li class="nav__item">
                            <a href="inicialE.php" class="nav__link">Sair</a>
                        </li>

                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                    </ul>
                </div>
            
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-grid-alt'></i>
                </div>
                
            </nav>
        </header>

        <main class="main">
            <!--=============== HOME ===============-->
            <section class="home section" id="home" style="margin-top:-5%;">
                <div class="home__container container grid">

        
 
                <div class="home__data">
                        <h1 class="home__title">Página Inicial</h1>
                        <p class="home__description" style="text-align: justify;">Olá, <?php echo $_SESSION['nome_professor']; ?>! Abaixo estão listadas as turmas cadastradas, caso não haja nenhuma, faça o mesmo através no acesso na barra de menu.</p>

                        </div>
<img src="assets/img/img2.png" alt="">
                    </div>   
                    </section>



                    <section class="home section" id="home">
                

                    <div class="table1" style="overflow-x:auto;" >
  <table class="footer section" >

            <tr>
                <th>Nome</th>
                <th>Ver turma</th>
            </tr>

            <form method ="post" action="processa3.php">
<?php  
    $lista = Turma::listar($tipo, $procurar);
    // echo "<pre>";
    // print_r($lista);
        foreach ($lista as $linha) {
    //         echo "<pre>";
    // print_r($linha);
    ?>
        <tr>
            <td><?php echo $linha['nome_turma'];?></td>
            <td>
                <a href="processa3.php?processa3=Seleciona&idturma=<?php echo $linha['id'];?>">Seleciona</a>
            </td>
            
        </tr>
            <?php } ?> 
            </form>
     
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