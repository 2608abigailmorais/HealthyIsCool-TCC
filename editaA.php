<!DOCTYPE html>
<?php 

    require_once "autoload.php";
    require_once  "conf/Conexao.php";
    require_once  "processa4.php";
    $title = "Editar | Aluno";

    $processa4 = isset($_GET['processa4']) ? $_GET['processa4'] : "";
    if ($processa4 == 'editar'){
        $id = isset($_GET['idaluno']) ? $_GET['idaluno'] : "";
        $idturma = isset($_GET['idturma']) ? $_GET['idturma'] : "";
    if ($id > 0)
       $aluno = Aluno::listar(3,$id);
}
// echo "<pre>";
// var_dump($aluno);
// echo $aluno[0]['id'];
// die();

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
                        
                        <h1 class="home__title">Editar Dados</h1>
                        <p class="home__description" style="text-align: justify;">Edite os dados do Aluno ou exclua o perfil do mesmo.</p>

    <form method="post" action="processa4.php">

    <input type="hidden" name="idturma" id="idturma" value="<?php if ($processa4 == "editar") echo $idturma; else echo 0; ?>">

        <p class="home__part">Código do Aluno</p>
        <input type="text" readonly name="id" id="id" value="<?php if ($processa4 == "editar") echo $aluno[0]['id']; else echo 0; ?>">
        <br><br>

        <p class="home__part">Nome Aluno</p>
        <input type="text" name="nome" id="nome" value="<?php if ($processa4 == "editar") echo $aluno[0]['nome']; else echo 0; ?>" required>
        <br><br>

        <p class="home__part">Sobrenome Aluno</p>
        <input type="text" name="sobrenome" id="sobrenome" value="<?php if ($processa4 == "editar") echo $aluno[0]['sobrenome']; else echo 0; ?>" required>
        <br><br>
        <input type="hidden" name="idmatricula" id="idmatricula" size="25" value="0">

        <p class="home__part">Número da Matricula</p>
        <input type="text" name="matricula" id="matricula" value="<?php if ($processa4 == "editar") echo $aluno[0]['matricula']; else echo 0; ?>" required>
        <br><br>

        <p class="home__part">Data da Mátricula</p>
        <input type="date" name="data" id="data" value="<?php if ($processa4 == "editar") echo $aluno[0]['data']; else echo 0; ?>" required>
        <br><br>
    
        
        <button name="processa4" id="processa4" value="editar" type="submit">Editar Matrícula</button>
        <a style="float:right;" class="button" href="processa4.php?id=<?php echo $aluno[0]['id'];?>&processa4=excluir&idturma=<?php echo $idturma; ?>">Excluir</a>

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

        <!--=============== SCIPT JS ===============-->
        <script src="assets/js/script.js"></script>
    </body>
</html>