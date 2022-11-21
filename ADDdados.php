<!DOCTYPE html>
<?php 
    require_once "classes/turma.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa5.php";
    $titulo = "Nova Avaliação";
    $aluno_idaluno = isset($_GET["idaluno"]) ? $_GET["idaluno"] : 0; 
    $idturma = isset($_GET["idturma"]) ? $_GET["idturma"] : 0; 
    

?>
<html lang="pt-br">
<head>
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
                        <a class="nav__link " href="avaliacoes.php?idaluno=<?php echo $aluno_idaluno; ?>&idturma=<?php echo $idturma;?>">Avaliações</a>
                        </li>

                        <li class="nav__item">
                        <a class="nav__link active-link" href="avaliacoes.php?idaluno=<?php echo $aluno_idaluno?>"> Nova Avaliação</a>
                        </li>   

                        <li class="nav__item">
                            <a href="alunos.php?idturma=<?php echo $idturma; ?>" class="nav__link">Voltar</a>
                        </li>

                        <i class='bx bx-toggle-left change-theme' id="theme-button"></i>
                    </ul>
                </div>

                </nav>
        </header>
        <main class="main">
            <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div class="home__container container grid">

        
 
                <div class="home__data">
                        <h1 class="home__title">Nova Avaliação</h1>
                        <p class="home__description" style="text-align: justify;">Insira os dados antropométricos para gerar o Indice de Massa Corporal do aluno.</p>



   
    <form method="post" action="processa5.php?idturma=<?php echo $idturma; ?>&idaluno=<?php echo $aluno_idaluno; ?>">

        <input type="hidden" name="id" id="id" value="<?php if(isset($aluno_idaluno)) echo $aluno_idaluno; else echo "";?>" size="25" value="0">

        <p class="home__part">Data</p>
        <input type="date" name="data" id="data" required>
<br><br>
        <p class="home__part">Peso</p>
        <input type="text" name="peso" id="peso" required>
<br><br>
        <p class="home__part">Altura</p>
        <input type="text" name="altura" id="altura" required>
    <br><br>
       
        <button class="button" name="processa5" id="processa5" value="calcular" type="submit">Calcular IMC</button>
        
    </form>

</div>
<img src="assets/img/img2.png" alt="">
    <script src="assets/js/script.js"></script>
</body>
</html>