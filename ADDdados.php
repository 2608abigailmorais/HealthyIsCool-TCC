<!DOCTYPE html>
<?php 
    require_once "classes/turma.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa5.php";
    $title = "Nova Avaliação";
    $aluno_idaluno = isset($_GET["idaluno"]) ? $_GET["idaluno"] : 0; 
    $idturma = isset($_GET["idturma"]) ? $_GET["idturma"] : 0; 


?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title> <?php echo $title; ?> </title>
    <link rel="shortcut icon" href="img/favicon.png">   
</head> 
<body>

    <p>REALIZAR</p>
    <p>NOVA AVALIAÇÃO</p>

   
    <form method="post" action="processa5.php">

        <input type="hidden" name="id" id="id" value="<?php if(isset($aluno_idaluno)) echo $aluno_idaluno; else echo "";?>" size="25" value="0">

        <p>DATA</p>
        <input type="date" name="data" id="data" required>

        <p>PESO</p>
        <input type="text" name="peso" id="peso" required>

        <p>ALTURA</p>
        <input type="text" name="altura" id="altura" required>
    
        <button><a href="alunos.php">VOLTAR</a></button>
        <button name="processa5" id="processa5" value="calcular" type="submit">CALCULAR IMC</button>
        
    </form>
    <td><button type="button"> <a href="alunos.php?idaluno=<?php echo $aluno_idaluno; ?>&idturma=<?php echo $idturma; ?>">VOLTAR</a></button></td>

    <script src="assets/js/script.js"></script>
</body>
</html>