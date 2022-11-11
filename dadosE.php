<!DOCTYPE html>
<?php 
    require_once "classes/escola.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa.php";
    $title = "Editar | Escola";

    $processa = isset($_GET['processa']) ? $_GET['processa'] : "";
    if ($processa == 'editar'){
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

    <script type="text/javascript">
			function abrir(){
				document.getElementById('popup').style.display = 'block';
			}
            function fechar(){
				document.getElementById('popup').style.display =  'none';
			}
		</script>
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
                            <a href="professor.php?id=<?php echo $_GET['id'];?>" class="nav__link">Novo Professor</a>
                        </li>

                        <li class="nav__item">
                            <a href="dadosE.php?id=<?php echo $_GET['id'];?>&processa=editar" class="nav__link active-link">Dados Escolares</a>
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
        <section class="home section" id="home" style="margin-top:-5%;">
                <div class="home__container container grid">

        
 

        
          
                    

                    <div class="home__data">
                        
                        <h1 class="home__title">Editar Dados</h1>
                        <p class="home__description" style="text-align: justify;">Edite os dados da Escola ou exclua o perfil da escola.</p>

   
   
    <form method="post" action="processa.php">

        
        <p class="home__part">Código da Escola</p>
        <input type="text" readonly name="id" id="id" value="<?php if ($processa == "editar") echo $dados['id']; else echo 0; ?>">
        <br><br>

        <p class="home__part">Nome da Escola</p>
        <input type="text" name="nome_escola" id="nome_escola" value="<?php if ($processa == "editar") echo $dados['nome_escola']; else echo 0; ?>" required>
        <br><br>

        <p class="home__part">Tipo da Escola</p>
        <select name="tipo" id="tipo" class="select"  style="border-bottom-width:2px; padding-bottom: .35rem ;
    padding-top: .55rem;" required>     
            <option>Pública</option>
            <option>Privada</option>
        </select>
         <br><br>

        <p class="home__part">Categoria de Ensino</p>
        <select name="categoria_ensino" class="select" id="categoria_ensino"  style="border-bottom-width:2px; padding-bottom: .35rem ;
    padding-top: .55rem;" required >     
        <?php
            require_once('utils.php');
            $categoria = Escola::listar(1,$id);
            echo Listar($categoria[0]['categoria_ensino']);
        ?>
        </select>
         <br><br>

        <p class="home__part">Cep</p>
        <input type="text" name="cep" id="cep" pattern="[0-9]{5}-[0-9]{3}" value="<?php if ($processa == "editar") echo $dados['cep']; else echo 0; ?>" required>
        <br><br>

        <p class="home__part">Email</p>
        <input type="email" name="email" id="email" value="<?php if ($processa == "editar") echo $dados['email']; else echo 0; ?>" required>
        <br><br>
       
        <p class="home__part">Senha</p>
        <input type="password" name="senha" id="senha" value="<?php if ($processa == "editar") echo $dados['senha']; else echo 0; ?>" required>
        
        <br><br>
        <button name="processa" id="processa" value="cadastrar" type="submit">Editar</button>
        <a class="button" style="float:right;" href="processa.php?id=<?php echo $dados['id'];?>&processa=excluir">Excluir Conta</a>



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