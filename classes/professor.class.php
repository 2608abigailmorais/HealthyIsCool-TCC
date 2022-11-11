<?php
    if(session_status() === PHP_SESSION_NONE){
        session_set_cookie_params(0);
        session_start();
    }
    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Professor extends Padrao{
        //cria as variáveis como privadas.
        private $nome_professor;
        private $universidade_form;
        private $dataNasci;
        private $emailP;
        private $senhaP;

        //constrói as variáveis.
        public function __construct($id, $nome_professor, $universidade_form, $dataNasci, $emailP, $senhaP, $escola_idescola){
            parent::__construct($id);
            $this->setNome_professor($nome_professor);
            $this->setuniversidade_form($universidade_form);
            $this->setCategoria($dataNasci);
            $this->setEmailP($emailP);
            $this->setSenhaP($senhaP);
            $this->setEscola($escola_idescola);
        }

        //busca e seta os valores das variáveis.

        public function getNome_professor(){ return $this->nome_professor; }
        public function setNome_professor($nome_professor){ $this->nome_professor = $nome_professor; }      

        public function getuniversidade_form() { return $this->universidade_form; }
        public function setuniversidade_form($universidade_form) { $this->universidade_form = $universidade_form; }

        public function getCategoria() { return $this->dataNasci; }
        public function setCategoria($dataNasci) { $this->dataNasci = $dataNasci; }

        public function getEmailP() { return $this->emailP; }
        public function setEmailP($emailP) { $this->emailP = $emailP; }
        
        public function getSenhaP() { return $this->senhaP; }
        public function setSenhaP($senhaP) { $this->senhaP = $senhaP; }

        public function getEscola() { return $this->escola_idescola; }
        public function setEscola($escola_idescola) { $this->escola_idescola = $escola_idescola; }

        public function __toString() {
            return  "[Escola]<br>ID da Escola: ".$this->getId()."<br>".
                    "Nome da Escola: ".$this->getNome_professor()."<br>".
                    "universidade_form de Escola: ".$this->getuniversidade_form()."<br>".
                    "Categoria de Ensino: ".$this->getCategoria()."<br>".
                    "EmailP: ".$this->getEmailP()."<br>".
                    "SenhaP: ".$this->getSenhaP()."<br>".
                    "Escola: ".$this->getEscola()."<br>".
                    "Contador: ".self::$contador."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO healthy.professor (nome_professor, universidade_form, dataNasci, emailP, senhaP, escola_idescola) 
            VALUES(:nome_professor, :universidade_form, :dataNasci, :emailP, :senhaP, :escola_idescola)';
            $parametros = array(":nome_professor"=>$this->getNome_professor(), 
                                ":universidade_form"=>$this->getuniversidade_form(),
                                ":dataNasci"=>$this->getCategoria(),
                                ":emailP"=>$this->getEmailP(),
                                ":senhaP"=>$this->getSenhaP(),
                                ":escola_idescola"=>$this->getEscola());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM healthy.professor WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE healthy.professor 
            SET nome_professor = :nome_professor, universidade_form = :universidade_form, dataNasci = :dataNasci, emailP = :emailP, senhaP = :senhaP, escola_idescola = :escola_idescola
            WHERE professor.id = :id';
            $parametros = array(":nome_professor"=>$this->getNome_professor(),
                                ":universidade_form"=>$this->getuniversidade_form(),
                                ":dataNasci"=>$this->getCategoria(),
                                ":emailP"=>$this->getEmailP(),
                                ":senhaP"=>$this->getSenhaP(),
                                ":escola_idescola"=>$this->getEscola(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM escola, professor WHERE professor.escola_idescola = escola.id AND escola.id = ".$_SESSION['id']."" ;
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " AND nome_professor LIKE :procurar"; "%".$procurar .="%"; break;
                    case(2): $consulta .= " AND universidade_form LIKE :procurar"; "%".$procurar .="%"; break;
                    //se universidade_form da consulta for por emailP, mostra as informações de acepdo com aquele emailP.
                    case(3): $consulta .= " AND emailP = :procurar "; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function efetuarLoginP($emailP, $senhaP){
            $sql = "SELECT professor.id, nome_professor, universidade_form, dataNasci, escola_idescola FROM professor, escola WHERE emailP = :emailP AND senhaP = :senhaP AND escola.id = ".$_SESSION['id']."";
            $parametros = array(
                ':emailP' => $emailP,
                ':senhaP' => $senhaP,
            );

            if (self::buscar($sql, $parametros)) {
                $_SESSION['id_prof'] = self::buscar($sql, $parametros)[0]['id'];
                $_SESSION['nome_professor'] = self::buscar($sql, $parametros)[0]['nome_professor'];
                $_SESSION['universidade_form'] = self::buscar($sql, $parametros)[0]['universidade_form'];
                $_SESSION['dataNasci'] = self::buscar($sql, $parametros)[0]['dataNasci'];
                $_SESSION['escola_idescola'] = self::buscar($sql, $parametros)[0]['escola_idescola'];
                return true;
            } else {
                $_SESSION['id_prof'] = "";
                $_SESSION['nome_professor'] = "";
                $_SESSION['universidade_form'] = "";
                $_SESSION['dataNasci'] = "";
                $_SESSION['escola_idescola'] = "";
                return false;
            }
        }
    
    }



                
?>