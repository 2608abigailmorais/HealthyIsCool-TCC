<!DOCTYPE html>
<?php 
    require_once "classes/turma.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa3.php";
    $title = "Cadastro | Turma";
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
                            <a href="inicialP.php" class="nav__link">Página Inicial</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="turma.php?id=<?php echo $_SESSION['id_prof'];?>" class="nav__link active-link">Nova Turma</a>
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

        <section class="home section" id="home" style="margin-top:-5%; ">
                <div class="home__container container grid">

                    <div class="home__data">
                        
                        <h1 class="home__title">Nova Turma</h1>
                        <p class="home__description" style="text-align: justify;">Preencha os dados solicitados e cadastre uma Nova Turma.</p>



   
    <form method="post" action="processa3.php">

    
        <p class="home__part">Nome da Turma</p>
        <input type="text" name="nome_turma" id="nome_turma" required>
        <br><br>

        <p class="home__part">Série</p>
        <input type="text" name="serie" id="serie" required>
        <br><br>

        <input type="hidden" name="professor_idprofessor" id="professor_idprofessor" size="25" value="<?php echo $_GET['id']?>">

        <button name="processa3" id="processa3" value="cadastrar" type="submit">Cadastrar</a></button>
        


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