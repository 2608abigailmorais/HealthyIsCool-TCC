<!DOCTYPE html>
<?php 
    require_once "classes/escola.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa.php";
    $title = "Cadastro | Escola";
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

     <!--=============== HEADER ===============-->
     <header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">HEALTHY IS COOL</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="index.php" class="nav__link">Conecte-se</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="escola.php" class="nav__link active-link">Cadastro</a>
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
                        <h1 class="home__title">Cadastro Escola</h1>

    <form method="post" action="processa.php">

       
        <input type="hidden" name="id" id="id" size="25" value="0">

        
        <p  class="home__part">Nome da Escola</p>
        <input type="text" name="nome_escola" id="nome_escola" required>
        <br><br>

        
        <p  class="home__part">Qual o tipo da Escola</p>
        <select name="tipo" id="tipo" class="select" style="border-bottom-width:2px; padding-bottom: .35rem ;
    padding-top: .55rem;"  required>     
            <option>Pública</option>
            <option>Privada</option>
        </select>
        
        <br><br>

        
        <p  class="home__part">Categoria de Ensino</p>
        <select name="categoria_ensino" class="select" id="categoria_ensino" style="border-bottom-width:2px; padding-bottom: .35rem ;
    padding-top: .55rem;" required>     
            <option>Ensino Médio</option>
            <option>Ensino Fundamental II</option>
            <option>Ensino Fundamental e Médio</option>
        </select>
        
        <br><br>
        
        <p  class="home__part">CEP</p>
        <input type="text" name="cep" id="cep" onkeypress="$(this).mask('00000-000');" maxlength="9" placeholder="00000-000" required>
        <br><br>

        <p  class="home__part">Email</p>
        <input type="email" name="email" id="email" class="input2" required>
        <br><br>

        <p  class="home__part">Senha</p>
        <input type="password" name="senha" id="senha" class="input2" required>
        <br><br>

	
        
        <button name="processa" id="processa" value="cadastrar" type="submit">Cadastrar</button>
        


    </form>

    </div>   
    <img src="assets/img/img2.png" alt="">
                 
                </div>

                
            </section>



           

        </main>

        <!--=============== FOOTER ===============-->
        <footer class="footer section">
            <div class="footer__container container grid">
                <div class="footer__content">
                    <a href="#" class="footer__logo">Healthy is Cool</a>
                    <p class="footer__description">Aplicativo direcionado a Professores de Educação Física.</p>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Sobre nós</h3>
                    <ul class="footer__links">
                        <li><a href="#" class="footer__link">Armazenar Dados</a></li>
                        <li><a href="#" class="footer__link">Gráficos</a></li>
                        <li><a href="#" class="footer__link">Acesso fácil</a></li>
                        <li><a href="#" class="footer__link">Organização</a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Companhia</h3>
                    <ul class="footer__links">
                        <li><a href="https://www.instagram.com/eibiiih/" class="footer__link">Back-end <br><b>Abigail</b></a></li>
                        <li><a href="https://www.instagram.com/anapaulacechet/" class="footer__link">Front-end<br><b>Ana Paula</b></a></li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Informações</h3>
                    <ul class="footer__links">
                        <li><a href="https://linktr.ee/healthyiscool" class="footer__link">Suporte</a></li>
                        <li><a href="#https://www.google.com.br/maps/place/Instituto+Federal+Catarinense+-+Campus+Rio+do+Sul/@-27.2121613,-49.6420107,17z/data=!3m1!4b1!4m5!3m4!1s0x94dfb9a5881e0679:0x7ad28c5276b53a06!8m2!3d-27.2121661!4d-49.639822" class="footer__link">Localização</a></li>
                    </ul>
                </div>

                <div class="footer__social">
                    <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                    <a href="https://twitter.com/CoolHeathy" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                    <a href="https://www.instagram.com/healthyiscool_/" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
                </div>
            </div>

            <p class="footer__copy">&#169; Healthy is Cool. Todos os direitos reservados</p>
        </footer>

        <!--=============== SCROLL UP ===============-->
        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-up-arrow-alt scrollup__icon'></i>
        </a>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main.js"></script>
        <!--=============== JQUERY ===============-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </body>
</html>