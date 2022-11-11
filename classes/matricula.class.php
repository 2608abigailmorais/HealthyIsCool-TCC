<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Matricula extends Padrao{
        //cria as variáveis como privadas.
        private $matricula;
        private $data;
        private $aluno_idaluno;
        private $turma_idturma;

        //constrói as variáveis.
        public function __construct($id, $matricula, $data, $aluno_idaluno, $turma_idturma){
            parent::__construct($id);
            $this->setMatricula($matricula);
            $this->setData($data);
            $this->setAluno($aluno_idaluno);
            $this->setTurma($turma_idturma);
        }

        //busca e seta os valores das variáveis.

        public function getMatricula(){ return $this->matricula; }
        public function setMatricula($matricula){ $this->matricula = $matricula; }   

        public function getData(){ return $this->data; }
        public function setData($data){ $this->data = $data; }      

        public function getAluno() { return $this->aluno_idaluno; }
        public function setAluno($aluno_idaluno) { $this->aluno_idaluno = $aluno_idaluno; }

        public function getTurma() { return $this->turma_idturma; }
        public function setTurma($turma_idturma) { $this->turma_idturma = $turma_idturma; }

        public function __toString() {
            return  "[Matrícula]<br>Número da Matrícula: ".$this->getId()."<br>".
                    "Data da Matrícula: ".$this->getData()."<br>".
                    "Aluno: ".$this->getAluno()."<br>".
                    "Turma Matriculada: ".$this->getTurma()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO healthy.matricula (matricula, data, aluno_idaluno, turma_idturma) 
            VALUES(:matricula, :data, LAST_INSERT_ID(), :turma_idturma)';
            $parametros = array(":matricula"=>$this->getMatricula(),
                                ":data"=>$this->getData(),
                                ":turma_idturma"=>$this->getTurma());
            return parent::executaComando($sql,$parametros);
        }
    
        public function excluir(){
            $sql = 'DELETE FROM healthy.matricula WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }
        //UPDATE `healthy`.`matricula` SET `matricula`='254545' WHERE `id`='2' and`aluno_idaluno`='2' and`turma_idturma`='2';

        public function editar(){
            $sql = 'UPDATE healthy.matricula 
            SET data = :data, aluno_idaluno = :aluno_idaluno, turma_idturma = :turma_idturma, matricula = :matricula
            WHERE matricula.id = :id';
            $parametros = array(":data"=>$this->getData(),
                                ":aluno_idaluno"=>$this->getAluno(),
                                ":matricula" => $this->getMatricula(),
                                ":turma_idturma"=>$this->getTurma(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM matricula" ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE matricula LIKE :procurar"; "%".$procurar .="%"; break;
                    case(2): $consulta .= " WHERE data LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE aluno_idaluno LIKE :procurar"; break;
                    case(4): $consulta .= " WHERE turma_idturma = :procurar "; break;
                }
                
            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            // return $parametros;
            return parent::buscar($consulta, $parametros);
        }

        
    }



                
?>