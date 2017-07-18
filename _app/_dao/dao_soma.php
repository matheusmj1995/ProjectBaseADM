<?php

class DaoSoma {

    public static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoSoma();

        return self::$instance;
    }

    public function Inserir_Soma(PojoSoma $soma) {
        try {
            $sql = "INSERT INTO teste (       
                soma_n1,
                soma_n2,
                soma_total
                ) 
                VALUES (
                :n1,
                :n2,
                :soma
                )";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":n1", $soma->getN1());
            $p_sql->bindValue(":n2", $soma->getN2());
            $p_sql->bindValue(":soma", $soma->getSoma());

            if ($p_sql->execute()){ 
                $ult_id = f_ultimo_id();
                return $ult_id;
            }else{
                echo "A inserção não se realizou"; 
            }
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
        }
    }

    public function Editar(PojoSoma $soma) {
        try {
            $sql = "UPDATE teste set
        nome = :nome,
                email = :email,
                senha = :senha,
                ativo = :ativo,
                cod_perfil = :cod_perfil WHERE soma_id = :soma_id";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":nome", $soma->getNome());
            $p_sql->bindValue(":email", $soma->getEmail());
            $p_sql->bindValue(":senha", $soma->getSenha());
            $p_sql->bindValue(":ativo", $soma->getAtivo());
            $p_sql->bindValue(":cod_perfil", $soma->getPerfil()->
getCod_perfil());
            $p_sql->bindValue(":soma_id", $soma->getSoma_id());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado
 um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->
getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function Deletar($id) {
        try {
            $sql = "DELETE FROM teste WHERE soma_id = :soma_id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":soma_id", $id);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
        }
    }

    public function BuscarPorID($id) {
        try {
            $sql = "SELECT * FROM teste WHERE soma_id = :soma_id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":soma_id", $id);
            $p_sql->execute();
            return $this->populaSoma($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
        }
    }

    private function populaSoma($row) {
            $pojo = new PojoSoma;
            $pojo->setSoma_id($row['soma_id']);
            $pojo->setN1($row['n1']);
            $pojo->setN2($row['n2']);
            $pojo->setSoma($row['soma']);
            $pojo->setPerfil(ControllerPerfil::getInstance()->BuscarPorID($row['soma_id']));
            return $pojo;
        }

    }

?>