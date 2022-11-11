<?php
    session_set_cookie_params(0);
    session_start();
    require_once "classes/turma.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa4.php";

    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : 0; 
    $id = isset($_GET["idturma"]) ? $_GET["idturma"] : 0; 
    $titulo = "Inicial | Turma";

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <title> <?php echo $titulo; ?> </title>
</head>

<body>


<header class="header" id="header">
            <nav class="nav container">
                <a href="#" class="nav__logo">HEALTHY IS COOL</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item">
                            <a href="inicialP.php" class="nav__link active-link">Página Inicial</a>
                        </li>
                        
                        <li class="nav__item">
                            <a href="addAluno.php?idturma=<?php echo $_GET['idturma'];?>" class="nav__link">Novo Aluno</a>
                        </li>

                        <li class="nav__item">
                            <a href="editaT.php?acao=editar&idturma=<?php echo $_GET['idturma'];?>" class="nav__link">Dados Turma</a>
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
        <main class="main">
            <!--=============== HOME ===============-->
            <section class="home section" id="home" style="margin-top:-5%;">
                <div class="home__container container grid">

        
 
                <div class="home__data">
                        <h1 class="home__title">Página Inicial</h1>
                        <p class="home__description" style="text-align: justify;">Olá, <?php echo $_SESSION['nome_professor']; ?>! Abaixo estão listados os alunos dessa turma, caso não haja nenhum, cadastre através da opção Novo Aluno na barra de menu.</p>


  </div>
<img src="assets/img/img2.png" alt="">
                    </div>   
                    </section>


                    <section class="home section" id="home">
                

                    <div class="table1" style="overflow-x:auto;" >
  <table class="footer section" >
            <tr>
                <th>Nome</th>
                <th>Editar</th>
                <th>Avaliações</th>
            </tr>


<?php  
    $lista = Turma::seleciona($id);
    // echo "<pre>";
    //     var_dump($lista);
    //     die();
        foreach ($lista as $linha) {
    ?>
        <tr>
            <td><?php echo $linha['nome'] ." ". $linha['sobrenome'];?></td>
            <td><a  class="link" href="editaA.php?idaluno=<?php echo $linha['id']?>&processa4=editar&idturma=<?php echo $linha['turma_idturma']?>">Editar</a></td>
            <td><a  class="link" href="avaliacoes.php?idaluno=<?php echo $linha['id']?>&idturma=<?php echo $linha['turma_idturma']?>">Avaliações</a></td>
        </tr>
            <?php } ?> 
        </table>

           
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