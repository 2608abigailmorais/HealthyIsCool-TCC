<!DOCTYPE html>
<?php 
    require_once "classes/turma.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa3.php";
    $title = "Editar | Turma";
    $processa3 = isset($_GET['acao']) ? $_GET['acao'] : "";
    if ($processa3 == 'editar'){
        $id = isset($_GET['idturma']) ? $_GET['idturma'] : "";
    if ($id > 0)
        $dados = buscarDados($id);
}
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
                            <a href="alunos.php?idturma=<?php echo $_GET['idturma'];?>" class="nav__link">Página Inicial</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="addAluno.php?idturma=<?php echo $_GET['idturma'];?>" class="nav__link">Novo Aluno</a>
                        </li>

                        <li class="nav__item">
                            <a href="editaT.php?processa3=editar&idturma=<?php echo $_GET['idturma'];?>" class="nav__link active-link">Dados Turma</a>
                        </li>

                        <li class="nav__item">
                            <a href="inicialP.php?id=<?php echo $_SESSION['id_prof'];?>" class="nav__link">Voltar</a>
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
                        <p class="home__description" style="text-align: justify;">Edite os dados da Turma ou exclua a mesma.</p>

   
    

   
    <form method="post" action="processa3.php">

        
        <p class="home__part">Código da Turma</p>
        <input type="text" readonly name="id" id="id" value="<?php if ($processa3 == "editar") echo $dados['id']; else echo 0; ?>">
        <br><br>

        
        <p class="home__part">Nome Turma</p>
        <input type="text" name="nome_turma" id="nome_turma" value="<?php if ($processa3 == "editar") echo $dados['nome_turma']; else echo 0; ?>" required>
        <br><br>

        
        <p class="home__part">Série</p>
        <input type="text" name="serie" id="serie" value="<?php if ($processa3 == "editar") echo $dados['serie']; else echo 0; ?>" required>
        <br><br>


        <!-- <button name="processa3" id="processa3" value="cadastrar" type="submit">Editar</button> -->
        <a style="float:left;" class="button" href="processa3.php?processa3=editar&idturma=<?php echo $dados['id'];?>">Editar</a>
        <a style="float:right;" class="button" href="processa3.php?processa3=excluir&idturma=<?php echo $dados['id'];?>">Excluir</a>



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