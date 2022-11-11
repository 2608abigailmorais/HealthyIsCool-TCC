<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    //session_start();

    $id = isset($_POST['id']) ? $_POST['id'] : 0;  
    if (empty($id)) {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;
    } 
    $data = isset($_POST['data']) ? $_POST['data'] : "";
    $peso = isset($_POST['peso']) ? $_POST['peso'] : "";   
    $altura = isset($_POST['altura']) ? $_POST['altura'] : "";   
    $aluno_idaluno = isset($_GET['idaluno']) ? $_GET['idaluno'] : "";   


    if(isset($_POST['processa5'])){$processa5 = $_POST['processa5'];}else if(isset($_GET['processa5'])){$processa5 = $_GET['processa5'];}else{$processa5="";}


    if ($processa5 == "excluir"){
        // $avaliacao = new Avaliacao("", $_POST['data'], $_POST['peso'], $_POST['altura'], $_GET['idaluno']);                  
        // $resultado = $avaliacao->excluir();
        // header("location:alunos.php?id=".$id);
    }
   
    if ($processa5 == "calcular"){
        $imc = Avaliacao::IMC($peso,$altura);
        $avaliacao = new Avaliacao(null, $data, $peso, $altura, $imc, $id);
        // echo "<pre>";
        // var_dump($avaliacao);
        // die();
        $avaliacao->insere();
        header("location:resultado.php?id=".$id);

    }   

    if ($processa5 == "salvar"){
        // $avaliacao = new Avaliacao("", $_POST['data'], $_POST['peso'], $_POST['altura'], $id);                  
        // $resultado = $avaliacao->insere();

        // header("location:avaliacoes.php?id=".$id);
    }
        
    if($processa5 == "editar"){ 
        // $id = isset($_POST['id']) ? $_POST['id'] : "";
        //     if($id > 0){
        //     $aluno = new Avaliacao($_POST['id'], $_POST['data'], $_POST['peso'], $_POST['altura'], $_GET['idaluno']);
        //     $resultado = $aluno->editar();
        //     header("location:alunos.php?id=".$id);
        // }
        }

        

//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM avaliacao WHERE id = $id and aluno.id = avaliacao.aluno_idaluno");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['data'] = $linha['data'];
        $dados['peso'] = $linha['peso'];
        $dados['altura'] = $linha['altura'];
        $dados['aluno_idaluno'] = $linha['aluno_idaluno'];


    }
    return $dados;
}

    

?>