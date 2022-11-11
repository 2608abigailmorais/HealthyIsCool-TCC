<?php
    header('Content-Type: application/json');
        require_once('classes/avaliacao.class.php');
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        
        $lista = Avaliacao::lista($tipo = 5,$info = $id);
        if ($lista) {
            echo json_encode($lista);
        }else {
            echo "Nenhum registro encontrado";
        }
?>