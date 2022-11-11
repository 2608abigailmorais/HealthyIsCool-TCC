<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "classes/professor.class.php";
    $title = "Login | Professor";
    $idescola = isset($_GET['idescola']) ? $_GET['idescola'] : "";


?>

<html lang="pt-br">
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
                            <a href="inicialE.php?id=<?php echo $idescola;?>" class="nav__link">Voltar</a>
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
                        
                        <h1 class="home__title">Se conecte</h1>
                        <p class="home__description" style="text-align: justify;">Bem-vindo Professor. Preencha os dados solicitados para ter acesso as suas turmas.</p>
            


            <form method="post" action="processa2.php?processa2=loginP&idescola=<?php echo $idescola;?>">

                <p class="home__part">Email do Professor</p>
                <input name="emailP" id="emailP" type="text" required="true"><br>
                <br><br>

                    <p class="home__part">Senha</p>
                    <input name="senhaP" id="senhaP" type="password" required="true"><br>     
             <br><br>


                <button id="loginP" name="loginP" value="loginP" type="submit">Conecte</button>
            </form>
   

         </div>
<img src="assets/img/img2.png" alt="">
                    </div>   

                 
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