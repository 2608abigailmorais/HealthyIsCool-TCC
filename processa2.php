<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    //session_start();

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    $nome_professor = isset($_POST['nome_professor']) ? $_POST['nome_professor'] : "";
    $universidade_form = isset($_POST['universidade_form']) ? $_POST['universidade_form'] : "";
    $dataNasci = isset($_POST['dataNasci']) ? $_POST['dataNasci'] : "";  
    $emailP = isset($_POST['emailP']) ? $_POST['emailP'] : "";   
    $senhaP = isset($_POST['senhaP']) ? $_POST['senhaP'] : "";   
    $idescola = isset($_GET['idescola']) ? $_GET['idescola'] : 0;   
    if(isset($_POST['processa2'])){$processa2 = $_POST['processa2'];}else if(isset($_GET['processa2'])){$processa2 = $_GET['processa2'];}else{$processa2="";}

    //chama no processa2.
    //verifica se ação do processa2 é igual a excluir.
    if ($processa2 == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        //verifica as informações dentro do processa2.
        $professor = new Professor($id, "", "", "", "", "", "");
        //exclui a linha selecionada.
        $resultado = $professor->excluir($id);
        header("location:inicialE.php");
    }
   
    //chama o processa2.
    //verifica se ação do processa2 é igual à salvar.

    if ($processa2 == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $professor = new Professor("", $_POST['nome_professor'], $_POST['universidade_form'], $_POST['dataNasci'], $_POST['emailP'],  $_POST['senhaP'], $_SESSION['id']);                  
            $resultado = $professor->insere();
            header("location:inicialE.php?id=".$_SESSION['id']);
        }else {    
        $professor = new Professor($_POST['id'], $_POST['nome_professor'], $_POST['universidade_form'], $_POST['dataNasci'], $_POST['emailP'],  $_POST['senhaP'], $_SESSION['id']);
        $resultado = $professor->editar();
        header("location:inicialE.php?id=".$_SESSION['id']);   
        }
}

//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM professor WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome_professor'] = $linha['nome_professor'];
        $dados['universidade_form'] = $linha['universidade_form'];
        $dados['dataNasci'] = $linha['dataNasci'];
        $dados['emailP'] = $linha['emailP'];
        $dados['senhaP'] = $linha['senhaP'];
        $dados['escola_idescola'] = $linha['escola_idescola'];

    }
    return $dados;
}

    include_once "autoload.php";
    if ($processa2 == "loginP"){
        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if(isset($_POST['emailP']) && isset($_POST['senhaP']) && professor::efetuarLoginP($_POST['emailP'], $_POST['senhaP'])) {
            header("Location: inicialP.php?idescola=$idescola");
        } else if(isset($_POST['emailP']) && isset($_POST['senhaP'])) {
            header("Location: loginP.php?msg=informações incorretas");
        }
    }





?>