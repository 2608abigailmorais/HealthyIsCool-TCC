<!DOCTYPE html>
<?php 
    require_once "autoload.php";
    require_once  "conf/Conexao.php";
    require_once  "processa4.php";
    $title = "Cadastro de Alunos";
    $idturma = isset($_GET["idturma"]) ? $_GET["idturma"] : 0; 
    $titulo = "Cadastro | Aluno";
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
                            <a href="alunos.php?idturma=<?php echo $_GET['idturma']; ?>" class="nav__link">Página Inicial</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="addAluno.php?idturma=<?php echo $_GET['idturma'];?>" class="nav__link active-link">Novo Aluno</a>
                        </li>

                        <li class="nav__item">
                            <a href="editaT.php?processa3=editar&idturma=<?php echo $_GET['idturma'];?>" class="nav__link">Dados Turma</a>
                        </li>

                        <li class="nav__item">
                            <a href="inicialP.php" class="nav__link">Voltar</a>
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
                        
                        <h1 class="home__title">Novo Aluno</h1>
                        <p class="home__description" style="text-align: justify;">Preencha os dados solicitados e cadastre um Novo Aluno.</p>

    <form method="post" action="processa4.php?idturma=<?php echo $idturma ?>">
       
        <input type="hidden" name="id" id="id" size="25" value="0">

        <p class="home__part">Nome Aluno</p>
        <input type="text" name="nome" autocomplete="off" id="nome" required>
        <br><br>

        <p class="home__part">Sobrenome Aluno</p>
        <input type="text" name="sobrenome" autocomplete="off" id="sobrenome" required>
        <br><br>
        <input type="hidden" name="idmatricula" id="idmatricula" size="25" value="0">

        <p class="home__part">Número da Matricula</p>
        <input type="text" name="matricula" id="matricula" autocomplete="off" required>
        <br><br>

        <p class="home__part">Data da Matrícula</p>
        <input type="date" name="data" id="data" class="input2" autocomplete="off" required>
        <br><br>

        <button name="processa4" id="processa4" value="salvar" type="submit">Cadastrar</button>
        
        

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