<?php
    require_once "conf/Conexao.php";
    include_once "autoload.php";

    //session_start();

    $id = isset($_POST['id']) ? $_POST['id'] : 0;   
    if (empty($id)) {
        $id = isset($_GET['id']) ? $_GET['id'] : 0;  
    }
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome'] : "";   
    $idmatricula = isset($_POST['idmatricula']) ? $_POST['idmatricula'] : "";   
    $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : ""; 
    $data = isset($_POST['data']) ? $_POST['data'] : "";   
    $turma_idturma = isset($_GET['idturma']) ? $_GET['idturma'] : ""; 
    if (empty($turma_idturma)) {
        $turma_idturma = isset($_POST['idturma']) ? $_POST['idturma'] : ""; 
    }  


    if(isset($_POST['processa4'])){$processa4 = $_POST['processa4'];}else if(isset($_GET['processa4'])){$processa4 = $_GET['processa4'];}else{$processa4="";}

    // var_dump($_GET);   


    //chama no processa4.
    //verifica se ação do processa4 é igual a excluir.
    if ($processa4 == "excluir"){
        $listar = Aluno::listar(4, $id);
        $aluno = new Aluno($listar[0]['id'], $listar[0]['nome'], $listar[0]['sobrenome']);
        $resultado = $aluno->excluir();
        $lista = Matricula::listar(3, $id);
        $matricula = new Matricula($lista[0]['id'], $lista[0]["matricula"], $lista[0]["data"], $lista[0]['id'], $turma_idturma);
        $resultadoM = $matricula->excluir();
        header("location:alunos.php?idturma=".$turma_idturma);
    }
   
    //chama o processa4.
    //verifica se ação do processa4 é igual à salvar.

    if ($processa4 == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";
         //verifica se o ID é igual a 0, se for cria/insere novo usuário, se não edita as informações no banco.
        if ($id == 0){
            $aluno = new Aluno("", $_POST['nome'], $_POST['sobrenome']);                  
            $resultado = $aluno->insere();
            $matricula = new Matricula("", $_POST["matricula"], $_POST["data"], "", $_GET["idturma"]);
            $resultadoM = $matricula->insere();
            header("location:alunos.php?idturma=".$turma_idturma);
        }
    }
        
    if($processa4 == "editar"){ 
        $idturma = isset($_POST['idturma']) ? $_POST['idturma'] : "";
            if($id > 0){
            $aluno = new Aluno($_POST['id'], $_POST['nome'], $_POST['sobrenome']);
            $resultado = $aluno->editar();
            
            $matriculaobj = Matricula::listar(3,$id);
            // echo "<pre>";
            // echo $id;
            // var_dump($matriculaobj);
            // die();
            $matricula = new Matricula($matriculaobj[0]['id'], $_POST["matricula"], $_POST["data"], $id, $idturma);
           
            $resultadoM = $matricula->editar();
            header("location:alunos.php?idturma=".$idturma);
                }
        }


//Consulta os dados dentro do banco.
    function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM aluno, matricula WHERE id = $id and aluno.id = matricula.aluno_idaluno");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['nome'] = $linha['nome'];
        $dados['sobrenome'] = $linha['sobrenome'];
        $dados['id'] = $linha['id'];
        $dados['matricula'] = $linha['matricula'];
        $dados['data'] = $linha['data'];
        $dados['aluno_idaluno'] = $linha['aluno_idaluno'];
        $dados['turma_idturma'] = $linha['turma_idturma'];


    }
    return $dados;
}

?>