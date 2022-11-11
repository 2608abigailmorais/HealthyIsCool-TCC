<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    //session_start();
    $resultado = "";

    $id = isset($_GET['idturma']) ? $_GET['idturma'] : 0;   
    $nome_turma = isset($_POST['nome_turma']) ? $_POST['nome_turma'] : "";
    $serie = isset($_POST['serie']) ? $_POST['serie'] : "";
    $professor_idprofessor = isset($_POST['professor_idprofessor']) ? $_POST['professor_idprofessor'] : "";   
    if(isset($_POST['processa3'])){$processa3 = $_POST['processa3'];}else if(isset($_GET['processa3'])){$processa3 = $_GET['processa3'];}else{$processa3="";}

   

    //chama no processa3.
    //verifica se ação do processa3 é igual a excluir.
    if ($processa3 == "excluir"){
        $id = isset($_GET['idturma']) ? $_GET['idturma'] : "";
        //verifica as informações dentro do processa3.
        $turma = new Turma($id, "", "", "");
        //exclui a linha selecionada.
        $resultado = $turma->excluir($id);
        header("location:inicialP.php?id=".$_SESSION['id_prof']);
    }
   
    //chama o processa3.
    //verifica se ação do processa3 é igual à salvar.

    if ($processa3 == "cadastrar"){
        $idprof = isset($_POST['professor_idprofessor']) ? $_POST['professor_idprofessor'] : "";
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.

        if ($id == 0){
            $turma = new Turma("", $_POST['nome_turma'], $_POST['serie'], $idprof);               
            $resultado = $turma->insere();
            header("location:inicialP.php?id=".$_SESSION['id_prof']);
 
        }
}

    if($processa3 == "editar"){ 
        $idprof = isset($_POST['professor_idprofessor']) ? $_POST['professor_idprofessor'] : "";
            if($id > 0){
            $turma = new Turma($_POST['id'], $_POST['nome_turma'], $_POST['serie'], $idprof);
            $resultado = $turma->editar();
            header("location:inicialP.php?id=".$_SESSION['id_prof']);
            }
        }

    if ($processa3 == "Seleciona"){
        if ($id > 0){
            // print_r($_GET);
            // die;
            header("location:alunos.php?idturma=".$id);
        };   
    }

    if($resultado){
        header("location:inicialP.php?id=".$idprof);   
    }


//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM turma WHERE id = $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome_turma'] = $linha['nome_turma'];
        $dados['serie'] = $linha['serie'];
        $dados['professor_idprofessor'] = $linha['professor_idprofessor'];
    }
    return $dados;
}

    include_once "autoload.php";
    if ($processa3 == "loginP"){
        //Login do usuário com sucesso, Login do usuário sem sucesso, Logout do usuário
        if(isset($_POST['emailP']) && isset($_POST['senhaP']) && Professor::efetuarLoginP($_POST['emailP'], $_POST['senhaP'])) {
            header("Location: inicialP.php");
        } else if(isset($_POST['emailP']) && isset($_POST['senhaP'])) {
            header("Location: loginP.php?msg=informações incorretas");
        }
    }





?>