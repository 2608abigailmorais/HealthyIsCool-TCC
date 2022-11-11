<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "classes/escola.class.php";
    $title = "Login - Escolas";

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>
</head>
<body>
    <fieldset>
        <h3 class = "diminui">CONECTE-SE A SUA CONTA</h3>
            <form method="post" action="processa.php?processa=login">
                <hr> <p>EMAIL DA ESCOLA:</p>
                    <input style="font-size:10px;" class="form-control" name="email" id="email" type="text" required="true"><br>
                <hr> <p>SENHA:</p>
                    <input style="font-size:10px;" class="form-control" name="senha" id="senha" type="password" required="true"><br><hr>
                <button id="login" name="login" value="login" type="submit" style="font-size:10px;" class="btn btn-outline-info btn-sm">CONECTAR-SE</button>
            </form>
        <br>
        <br>
        NÃO POSSUI CADASTRO AINDA?<a href="escola.php">  CLIQUE AQUI</a>
            </fieldset></div></div></div>

    
</body>
</html>