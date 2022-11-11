<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Avaliacao extends Padrao{
        //cria as variáveis como privadas.
        private $data;
        private $peso;
        private $altura;
        private $imc;
        private $aluno_idaluno;

        //constrói as variáveis.
        public function __construct($id, $data, $peso, $altura, $imc, $aluno_idaluno){
            parent::__construct($id);
            $this->setData($data);
            $this->setPeso($peso);
            $this->setAltura($altura);
            $this->setImc($imc);
            $this->setAluno($aluno_idaluno);
        }

        //busca e seta os valores das variáveis.


        public function getData(){ return $this->data; }
        public function setData($data){ $this->data = $data; }   

        public function getPeso(){ return $this->peso; }
        public function setPeso($peso){ $this->peso = $peso; }      

        public function getAltura() { return $this->altura; }
        public function setAltura($altura) { $this->altura = $altura; }

        public function getImc() { return $this->imc; }
        public function setImc($imc) { $this->imc = $imc; }

        public function getAluno() { return $this->aluno_idaluno; }
        public function setAluno($aluno_idaluno) { $this->aluno_idaluno = $aluno_idaluno; }

        public function __toString() {
            return  "[Avaliação]<br>ID: ".$this->getId()."<br>".
                    "Data: ".$this->getData()."<br>".
                    "Peso: ".$this->getPeso()."<br>".
                    "Altura: ".$this->getAltura()."<br>".
                    "Aluno: ".$this->getAluno()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO healthy.avaliacao (data, peso, altura, imc, aluno_idaluno) 
                    VALUES(:data, :peso, :altura, :imc,:aluno_idaluno)';
            $parametros = array(":data"=>$this->getData(),
                                ":peso"=>$this->getPeso(),
                                ":altura"=>$this->getAltura(),
                                ":imc"=> $this->getImc() ,
                                ":aluno_idaluno"=>$this->getAluno());
                                // var_dump($this->getAluno());
                                // die();
            return parent::executaComando($sql,$parametros);
        }
    
        public function excluir(){
            $sql = 'DELETE FROM healthy.avaliacao WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE healthy.avaliacao 
            SET data = :data, peso = :peso, altura = :altura, imc = :imc, aluno_idaluno = :aluno_idaluno
            WHERE avaliacao.id = :id';
            $parametros = array(":data"=>$this->getData(),
                                ":peso"=>$this->getPeso(),
                                ":altura"=>$this->getAltura(),
                                ":imc"=>$this->getImc(),
                                ":aluno_idaluno"=>$this->getAluno(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function lista($buscar = 0, $procurar = ""){
            $consulta = "SELECT * FROM avaliacao, aluno" ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE data LIKE :procurar"; "%".$procurar .="%"; break;
                    case(2): $consulta .= " WHERE peso LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE altura LIKE :procurar"; "%".$procurar .="%"; break;
                    case(4): $consulta .= " WHERE aluno_idaluno = aluno.id AND aluno_idaluno = :procurar "; break;
                    case(5): $consulta .= " WHERE avaliacao.aluno_idaluno = aluno.id AND aluno.id = :procurar"; break;
                }

            if ($buscar > 0 && $procurar != '')
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM avaliacao, aluno" ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE data LIKE :procurar"; "%".$procurar .="%"; break;
                    case(2): $consulta .= " WHERE peso LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE altura LIKE :procurar"; "%".$procurar .="%"; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }

        public static function listar2($buscar = 0, $procurar = "", $aluno = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM avaliacao, aluno WHERE avaliacao.aluno_idaluno = $aluno" ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " AND avaliacao.aluno_idaluno = aluno.id ORDER BY data"; break;
                }

            if ($buscar > 0){
                if (!empty($procurar)) {
                   $parametros = array(':procurar'=>$procurar);
                }
                $parametros = array();
                $aluno = array(':aluno_idaluno'=>$aluno);
            }else {
                $parametros = array();
                $aluno = array(':aluno_idaluno'=>$aluno);
            }
            return parent::buscar3($consulta, $parametros, $aluno);
        }
        public static function IMC($peso,$altura){
            $imc = $peso / ($altura * $altura);
            return  number_format($imc, 2,'.',1);
        }
    }



                
?>