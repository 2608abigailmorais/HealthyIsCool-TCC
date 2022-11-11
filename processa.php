<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $nome_escola = isset($_POST['nome_escola']) ? $_POST['nome_escola'] : "";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    $categoria_ensino = isset($_POST['categoria_ensino']) ? $_POST['categoria_ensino'] : "";   
    $cep = isset($_POST['cep']) ? $_POST['cep'] : 0;   
    $email = isset($_POST['email']) ? $_POST['email'] : "";   
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";   
    if(isset($_POST['processa'])){$processa = $_POST['processa'];}else if(isset($_GET['processa'])){$processa = $_GET['processa'];}else{$processa="";}

    //chama no processa.
    //verifica se ação do processa é igual a excluir.
    if ($processa == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        //verifica as informações dentro do processa.
        $escola = new Escola($id, "", "", "", 0, "", "");
        //exclui a linha selecionada.
        $resultado = $escola->excluir($id);
        header("location:escola.php");
    }
   
    //chama o processa.
    //verifica se ação do processa é igual à salvar.
    if ($processa == "cadastrar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $escola = new Escola("", $_POST['nome_escola'], $_POST['tipo'], $_POST['categoria_ensino'], $_POST['cep'],  $_POST['email'],  $_POST['senha']);                  
            $resultado = $escola->insere();
            header("location:confirma.php");
        }else {    
        $escola = new Escola($_POST['id'], $_POST['nome_escola'], $_POST['tipo'], $_POST['categoria_ensino'], $_POST['cep'], $_POST['email'], $_POST['senha']);
        $resultado = $escola->editar();
        header("location:inicialE.php");   
        }
}


//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM escola WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome_escola'] = $linha['nome_escola'];
        $dados['tipo'] = $linha['tipo'];
        $dados['categoria_ensino'] = $linha['categoria_ensino'];
        $dados['cep'] = $linha['cep'];
        $dados['email'] = $linha['email'];
        $dados['senha'] = $linha['senha'];

    }
    return $dados;
}

    include_once "autoload.php";
    if ($processa == "login"){
        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if(isset($_POST['email']) && isset($_POST['senha']) && escola::efetuarLogin($_POST['email'], $_POST['senha'])) {
            header("Location: inicialE.php");
        } else if(isset($_POST['email']) && isset($_POST['senha'])) {
            header("Location: index.php?msg=informações incorretas");
        }
    }


?>