<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Turma extends Padrao{
        private $nome_turma;
        private $serie;
        private $professor_idprofessor;

        public function __construct($id, $nome_turma, $serie, $professor_idprofessor){
            parent::__construct($id);
            $this->setNome_turma($nome_turma);
            $this->setSerie($serie);
            $this->setProfessor($professor_idprofessor);
        }

        public function getNome_turma(){ return $this->nome_turma; }
        public function setNome_turma($nome_turma){ $this->nome_turma = $nome_turma; }      

        public function getSerie() { return $this->serie; }
        public function setSerie($serie) { $this->serie = $serie; }

        public function getProfessor() { return $this->professor_idprofessor; }
        public function setProfessor($professor_idprofessor) { $this->professor_idprofessor = $professor_idprofessor; }


        public function __toString() {
            return  "[Escola]<br>ID da Escola: ".$this->getId()."<br>".
                    "Nome da Escola: ".$this->getNome_turma()."<br>".
                    "serie de Escola: ".$this->getSerie()."<br>".
                    "Categoria de Ensino: ".$this->getProfessor();
        }

        public function insere(){
            $sql = 'INSERT INTO healthy.turma (nome_turma, serie, professor_idprofessor) 
            VALUES(:nome_turma, :serie, :professor_idprofessor)';
            $parametros = array(":nome_turma"=>$this->getNome_turma(), 
                                ":serie"=>$this->getSerie(),
                                ":professor_idprofessor"=>$this->getProfessor());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM healthy.turma WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE healthy.turma 
            SET nome_turma = :nome_turma, serie = :serie, professor_idprofessor = :professor_idprofessor
            WHERE turma.id = :id';
            $parametros = array(":nome_turma"=>$this->getNome_turma(),
                                ":serie"=>$this->getSerie(),
                                ":professor_idprofessor"=>$this->getProfessor(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM professor, turma WHERE turma.professor_idprofessor = ".$_SESSION['id_prof']." AND turma.professor_idprofessor = professor.id" ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " AND nome_turma LIKE :procurar"; "%".$procurar .="%"; break;
                    case(2): $consulta .= " AND serie LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " AND id = :procurar "; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }

        public static function seleciona($id){
            $seleciona = "SELECT * FROM aluno,turma,matricula WHERE aluno.id = matricula.aluno_idaluno AND matricula.turma_idturma = :id GROUP BY aluno.id";
            $parametros = array(':id'=>$id);
            return parent::buscar2($seleciona, $parametros);

        }
        
        public static function efetuarLoginP($emailP, $senhaP){
            $sql = "SELECT professor.id, nome_turma, serie, professor_idprofessor, escola_idescola FROM professor, escola WHERE emailP = :emailP AND senhaP = :senhaP AND escola.id = ".$_SESSION['id']."";
            $parametros = array(
                ':emailP' => $emailP,
                ':senhaP' => $senhaP,
            );

            if (self::buscar($sql, $parametros)) {
                $_SESSION['id'] = self::buscar($sql, $parametros)[0]['id'];
                $_SESSION['nome_turma'] = self::buscar($sql, $parametros)[0]['nome_turma'];
                $_SESSION['serie'] = self::buscar($sql, $parametros)[0]['serie'];
                $_SESSION['professor_idprofessor'] = self::buscar($sql, $parametros)[0]['professor_idprofessor'];
                $_SESSION['escola_idescola'] = self::buscar($sql, $parametros)[0]['escola_idescola'];
                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome_turma'] = "";
                $_SESSION['serie'] = "";
                $_SESSION['professor_idprofessor'] = "";
                $_SESSION['escola_idescola'] = "";
                return false;
            }
        }


    
    }



                
?>
