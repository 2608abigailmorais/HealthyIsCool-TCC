<?php
    session_set_cookie_params(0);
    session_start();
    require_once "classes/avaliacao.class.php";
    require_once  "conf/Conexao.php";
    require_once  "processa5.php";
    $procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : ""; 
    $tipo = isset($_GET["tipo"]) ? $_GET["tipo"] : 0; 
    $aluno_idaluno = isset($_GET["idaluno"]) ? $_GET["idaluno"] : ""; 
    $idturma = isset($_GET["idturma"]) ? $_GET["idturma"] : 0; 



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <br>
 
    <table border="1" style="text-align:left;">
        <tr>
            <td><b>DATA</b></td>
            <td><b>PESO</b></td>
            <td><b>ALTURA</b></td>
        </tr> 
        <?php
            $lista = Avaliacao::listar2(1, $procurar, $aluno_idaluno);
            foreach ($lista as $linha) {
        ?>
        Avaliações do(a) Aluno(a)<?php echo $linha['nome'];?>
        <tr>
            <th><?php echo $linha['data'];?></th>
            <th><?php echo $linha['peso'];?></th>
            <th><?php echo $linha['altura'];?></th>
        </tr>
        <?php } ?> 
    </table>
    <td><button type="button"> <a href="ADDdados.php?idaluno=<?php echo $aluno_idaluno?>">NOVA AVALIAÇÃO</a></button></td>
    <td><button type="button"> <a href="alunos.php?idturma=<?php echo $idturma; ?>">VOLTAR</a></button></td>

</body>
</html>