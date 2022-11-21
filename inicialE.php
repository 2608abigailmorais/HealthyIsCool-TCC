<?php
    session_set_cookie_params(0);
    session_start();
    require_once "classes/professor.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa2.php";
    //include_once  "processa.php";
    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : ""; 
    $title = "Inicial | Escola";
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
                            <a href="inicialE.php" class="nav__link active-link">Página Inicial</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="professor.php?id=<?php echo $_SESSION['id'];?>" class="nav__link">Novo Professor</a>
                        </li>

                        <li class="nav__item">
                            <a href="dadosE.php?id=<?php echo $_SESSION['id'];?>&processa=editar" class="nav__link">Dados Escolares</a>
                        </li>

                        <li class="nav__item">
                            <a href="index.php" class="nav__link">Sair</a>
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
                        <p class="home__description" style="text-align: justify;">Olá, <?php echo $_SESSION['nome_escola']; ?>! Abaixo estão listados os professores cadastrados, caso não haja nenhum, faça o mesmo através no acesso na barra de menu.</p>


  </div>
<img src="assets/img/img2.png" alt="">
                    </div>   
                    </section>


                    <section class="home section" id="home">
                

                    <div class="table1" style="overflow-x:auto;" >
  <table class="footer section" >
            <tr>
                <th>Nome</th>
                <th>Editar</th>
                <th>Login</th>
            </tr>

<?php  
    $lista = Professor::listar($tipo, $procurar);
    // echo "<pre>";
    // var_dump($lista);
    // die();
        foreach ($lista as $linha) {
    ?>
        <tr>
            <td><?php echo $linha['nome_professor'];?></td>
            <td><a class="link" href='editaP.php?processa2=editar&id=<?php echo $linha['id'];?>'>Editar</a></td>


            <td><a class="link" href='loginP.php?idescola=<?php echo $_SESSION['id']?>'>Logar</a></td>
        </tr>
            <?php } ?> 
        </table>
        
    
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