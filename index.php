<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "classes/escola.class.php";
    $title = "Login | Escola";

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
                            <a href="index.php" class="nav__link active-link">Conecte-se</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="escola.php" class="nav__link">Cadastro</a>
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
                        <h1 class="home__title">Se conecte</h1>
                        <p class="home__description" style="text-align: justify;">Seja bem-vindo ao Sistema da Healthy is Cool. Faça parte de Escolas que se importam com a saúde e bem-estar de seus alunos. Caso não possua cadastro, acesse o menu acima.</p>

                        
                        <form method="post" action="processa.php?processa=login">

        
<p class="home__part">Email da Escola</p>
<input name="email" id="email" type="text" autocomplete="off" required="true">
<br><br>
<p class="home__part">Senha</p>
<input name="senha" id="senha" type="password" autocomplete="off" required="true">
<br><br>
<button id="login" name="login" value="login" type="submit">Conecte</button>
</form>

</div>
<img src="assets/img/img2.png" alt="">
                    </div>   

                 
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
    </body>
</html>