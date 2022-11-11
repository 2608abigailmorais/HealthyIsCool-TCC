<!DOCTYPE html>
<?php 
    require_once "classes/escola.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa2.php";
    $title = "Cadastro | Professores";
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
                            <a href="inicialE.php" class="nav__link">Página Inicial</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="professor.php?id=<?php echo $_GET['id'];?>" class="nav__link active-link">Novo Professor</a>
                        </li>

                        <li class="nav__item">
                            <a href="dadosE.php?id=<?php echo $_GET['id'];?>&processa=editar" class="nav__link">Dados Escolares</a>
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
        <section class="home section" id="home" style="margin-top:-5%; ">
                <div class="home__container container grid">

        
 

        
          
                    

                    <div class="home__data">
                        
                        <h1 class="home__title">Novo Professor</h1>
                        <p class="home__description" style="text-align: justify;">Preencha os dados solicitados e cadastre um Novo Professor.</p>

   
    <form method="post" action="processa2.php">

      
        <input type="hidden" name="id" id="id" size="25" value="0">

        <p class="home__part">Nome Professor</p>
        <input type="text" name="nome_professor" autocomplete="off" id="nome_professor" required>
        <br><br>

        <p class="home__part">Unidade de formação</p>
        <input type="text" name="universidade_form" autocomplete="off"id="universidade_form" required>
        <br><br>

        <p class="home__part">Data de nascimento</p>
        <input type="date" name="dataNasci" autocomplete="off" id="dataNasci" required>
        <br><br>

        <p class="home__part">Email</p>
        <input type="email" name="emailP" id="emailP"  autocomplete="off" class="input2" required>
        <br><br>

        <p class="home__part">Senha</p>
        <input type="password" name="senhaP" id="senhaP"  autocomplete="off" class="input2" required>
        <br><br>

        <input type="hidden" name="escola_idescola" id="escola_idescola" size="25" value="">
    

        
        <button name="processa2" id="processa2" value="salvar" type="submit">Cadastrar</button>
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

        <!--=============== SCRIPT JS ===============-->
        <script src="assets/js/script.js"></script>
    </body>
</html>