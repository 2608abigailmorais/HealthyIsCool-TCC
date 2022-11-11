<?php

    include_once "conf/Conexao.php";
    include_once "conf/conf.inc.php";
    include_once "padrao.class.php";

    class Escola extends Padrao{
        //cria as variáveis como privadas.
        private $nome_escola;
        private $tipo;
        private $categoria_ensino;
        private $cep;
        private $email;
        private $senha;

        //constrói as variáveis.
        public function __construct($id, $nome_escola, $tipo, $categoria_ensino, $cep, $email, $senha){
            parent::__construct($id);
            $this->setNome_escola($nome_escola);
            $this->setTipo($tipo);
            $this->setCategoria($categoria_ensino);
            $this->setCep($cep);
            $this->setEmail($email);
            $this->setSenha($senha);
        }

        //busca e seta os valores das variáveis.

        public function getNome_escola(){ return $this->nome_escola; }
        public function setNome_escola($nome_escola){ $this->nome_escola = $nome_escola; }      

        public function getTipo() { return $this->tipo; }
        public function setTipo($tipo) { $this->tipo = $tipo; }

        public function getCategoria() { return $this->categoria_ensino; }
        public function setCategoria($categoria_ensino) { $this->categoria_ensino = $categoria_ensino; }

        public function getCep() { return $this->cep; }
        public function setCep($cep) { $this->cep = $cep; }

        public function getEmail() { return $this->email; }
        public function setEmail($email) { $this->email = $email; }
        
        public function getSenha() { return $this->senha; }
        public function setSenha($senha) { $this->senha = $senha; }

        public function __toString() {
            return  "[Escola]<br>ID da Escola: ".$this->getId()."<br>".
                    "Nome da Escola: ".$this->getNome_escola()."<br>".
                    "Tipo de Escola: ".$this->getTipo()."<br>".
                    "Categoria de Ensino: ".$this->getCategoria()."<br>".
                    "CEP: ".$this->getCep()."<br>".
                    "Email: ".$this->getEmail()."<br>".
                    "Senha: ".$this->getSenha()."<br>";
        }

        public function insere(){
            $sql = 'INSERT INTO healthy.escola (nome_escola, tipo, categoria_ensino, cep, email, senha) 
            VALUES(:nome_escola, :tipo, :categoria_ensino, :cep, :email, :senha)';
            $parametros = array(":nome_escola"=>$this->getNome_escola(), 
                                ":tipo"=>$this->getTipo(),
                                ":categoria_ensino"=>$this->getCategoria(),
                                ":cep"=>$this->getCep(), 
                                ":email"=>$this->getEmail(),
                                ":senha"=>$this->getSenha());
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM healthy.escola WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE healthy.escola 
            SET nome_escola = :nome_escola, tipo = :tipo, categoria_ensino = :categoria_ensino, cep = :cep, email = :email, senha = :senha
            WHERE id = :id';
            $parametros = array(":nome_escola"=>$this->getNome_escola(),
                                ":tipo"=>$this->getTipo(),
                                ":categoria_ensino"=>$this->getCategoria(),
                                ":cep"=>$this->getCep(),
                                ":email"=>$this->getEmail(),
                                ":senha"=>$this->getSenha(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM escola";
            if($buscar > 0)
                switch($buscar){
                    //se tipo da consulta for por id, mostra as informações de acepdo com aquele id.
                    case(1): $consulta .= " WHERE id = :procurar"; break;
                    //se tipo da consulta for por nome_escola, mostra as informações de acepdo com aquele nome_escola.
                    case(2): $consulta .= " WHERE nome_escola LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE tipo LIKE :procurar"; "%".$procurar .="%"; break;
                    //se tipo da consulta for por cep, mostra as informações de acepdo com aquele cep.
                    case(4): $consulta .= " WHERE cep LIKE :procurar "; $procurar = "%".$procurar."%"; break;
                    //se tipo da consulta for por email, mostra as informações de acepdo com aquele email.
                    case(5): $consulta .= " WHERE email = :procurar "; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function efetuarLogin($email, $senha){
            $sql = "SELECT id, nome_escola, tipo, categoria_ensino, cep FROM escola WHERE email = :email AND senha = :senha";
            $parametros = array(
                ':email' => $email,
                ':senha' => $senha,
            );
            session_set_cookie_params(0);
            session_start();
            if (self::buscar($sql, $parametros)) {
                $_SESSION['id'] = self::buscar($sql, $parametros)[0]['id'];
                $_SESSION['nome_escola'] = self::buscar($sql, $parametros)[0]['nome_escola'];
                $_SESSION['tipo'] = self::buscar($sql, $parametros)[0]['tipo'];
                $_SESSION['categoria_ensino'] = self::buscar($sql, $parametros)[0]['categoria_ensino'];
                $_SESSION['cep'] = self::buscar($sql, $parametros)[0]['cep'];
                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome_escola'] = "";
                $_SESSION['tipo'] = "";
                $_SESSION['categoria_ensino'] = "";
                $_SESSION['cep'] = "";
                return false;
            }
        }
    
    }



                
?>