<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Aluno extends Padrao{
        //cria as variáveis como privadas.
        private $nome;
        private $sobrenome;

        //constrói as variáveis.
        public function __construct($id, $nome, $sobrenome){
            parent::__construct($id);
            $this->setNome($nome);
            $this->setSobrenome($sobrenome);
        }

        //busca e seta os valores das variáveis.

        public function getNome(){ return $this->nome; }
        public function setNome($nome){ $this->nome = $nome; }      

        public function getSobrenome() { return $this->sobrenome; }
        public function setSobrenome($sobrenome) { $this->sobrenome = $sobrenome; }

        public function __toString() {
            return  "[Aluno]<br>ID do Aluno: ".$this->getId()."<br>".
                    "Nome do Aluno: ".$this->getNome()."<br>".
                    "Sobrenome do Aluno: ".$this->getSobrenome()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO healthy.aluno (nome, sobrenome) 
            VALUES(:nome, :sobrenome)';
            $parametros = array(":nome"=>$this->getNome(), 
                                ":sobrenome"=>$this->getSobrenome());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM healthy.aluno WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE healthy.aluno 
            SET nome = :nome, sobrenome = :sobrenome
            WHERE aluno.id = :id'; 
            $parametros = array(":nome"=>$this->getNome(),
                                ":sobrenome"=>$this->getSobrenome(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM aluno" ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE nome LIKE :procurar"; "%".$procurar .="%"; break;
                    case(2): $consulta .= " WHERE sobrenome = :procurar "; break;
                    case(3): $consulta = "SELECT * FROM aluno, matricula WHERE aluno.id = :procurar AND matricula.aluno_idaluno = aluno.id"; break;
                    case(4): $consulta .= " WHERE id = :procurar"; break;
                }
                // return $consulta;
            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
    }



                
?>