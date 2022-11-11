<!DOCTYPE html>
<?php 
    require_once "classes/professor.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa2.php";
    $title = "Editar | Professor";

    $processa2 = isset($_GET['processa2']) ? $_GET['processa2'] : "";
    if ($processa2 == 'editar'){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
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
                            <a href="inicialE.php" class="nav__link">Voltar</a>
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
                        <p class="home__description" style="text-align: justify;">Edite os dados do Professor ou exclua o perfil do mesmo.</p>

   
    

   
    <form method="post" action="processa2.php">

        
        <p class="home__part">Código do Professor</p>
        <input type="text" readonly name="id" id="id" value="<?php if ($processa2 == "editar") echo $dados['id']; else echo 0; ?>">
        <br><br>
        
        <p class="home__part">Nome do Professor</p>
        <input type="text" name="nome_professor" id="nome_professor" value="<?php if ($processa2 == "editar") echo $dados['nome_professor']; else echo 0; ?>" required>
        <br><br>
        
        <p class="home__part">Unidade de Formação</p>
        <input type="text" name="universidade_form" id="universidade_form" value="<?php if ($processa2 == "editar") echo $dados['universidade_form']; else echo 0; ?>" required>
        <br><br>
        
        <p class="home__part">Data de Nascimento</p>
        <input type="date" name="dataNasci" id="dataNasci" value="<?php if ($processa2 == "editar") echo $dados['dataNasci']; else echo 0; ?>" required>
        <br><br>
        
        <p class="home__part">Email</p>
        <input type="emailP" name="emailP" id="emailP" value="<?php if ($processa2 == "editar") echo $dados['emailP']; else echo 0; ?>" required>
        <br><br>

        <p class="home__part">Senha</p>
        <input type="password" name="senhaP" id="senhaP" value="<?php if ($processa2 == "editar") echo $dados['senhaP']; else echo 0; ?>" required>
        <br><br>
        
      

        
        <button name="processa2" id="processa2" value="salvar" type="submit">Editar</button>
        <a  style="float:right;" class="button" href="processa2.php?id=<?php echo $dados['id'];?>&processa2=excluir">Excluir</a>



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