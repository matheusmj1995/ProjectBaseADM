<?php

class DaoCliente {

    public static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new DaoCliente();

        return self::$instance;
    }

    public function Inserir_Cliente(PojoCliente $cliente) {
        try {
            $sql = "INSERT INTO adm_clientes (  
                ADM_CLI_TIPO,
                ADM_CLI_CPF_CNPJ,
                ADM_CLI_NOME,
                ADM_CLI_NOME_FANT,
                ADM_CLI_DT_CAD,
                ADM_CLI_DT_NASC,
                ADM_CLI_RG,
                ADM_CLI_GRUPO_ID,
                ADM_CLI_FONE_RES,
                ADM_CLI_FONE_CEL1,
                ADM_CLI_FONE_CEL2,
                ADM_CLI_CEP,
                ADM_CLI_LOG,
                ADM_CLI_LOG_CIDADE,
                ADM_CLI_LOG_BAIRRO,
                ADM_CLI_LOG_UF,
                ADM_CLI_LOG_NUM,
                ADM_CLI_LOG_COMP,
                ADM_CLI_EMAIL,
                ADM_CLI_OBS,
                ADM_CLI_EXCLUIDO       
            ) 
            VALUES (
                :cli_tipo,
                :cli_cpf_cnpj,
                :cli_nome,
                :cli_nome_fant,
                :cli_dt_cad,
                :cli_dt_nasc,
                :cli_rg,
                :cli_grupo_id,
                :cli_fone_res,
                :cli_fone_cel1,
                :cli_fone_cel2,
                :cli_cep,
                :cli_log,
                :cli_log_cidade,
                :cli_log_bairro,
                :cli_log_uf,
                :cli_log_num,
                :cli_log_comp,
                :cli_email,
                :cli_obs, 
                :cli_excluido         
            )";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":cli_tipo",      $cliente->getAdm_cli_tipo());
            $p_sql->bindValue(":cli_cpf_cnpj",  $cliente->getAdm_cli_cpf_cnpj());
            $p_sql->bindValue(":cli_nome",      $cliente->getAdm_cli_nome());
            $p_sql->bindValue(":cli_nome_fant", $cliente->getAdm_cli_nome_fant());
            $p_sql->bindValue(":cli_dt_cad",    $cliente->getAdm_cli_dt_cad());
            $p_sql->bindValue(":cli_dt_nasc",   $cliente->getAdm_cli_dt_nasc());
            $p_sql->bindValue(":cli_rg",        $cliente->getAdm_cli_rg());
            $p_sql->bindValue(":cli_grupo_id",  $cliente->getAdm_cli_grupo_id());
            $p_sql->bindValue(":cli_fone_res",  $cliente->getAdm_cli_fone_res());
            $p_sql->bindValue(":cli_fone_cel1", $cliente->getAdm_cli_fone_cel1());
            $p_sql->bindValue(":cli_fone_cel2", $cliente->getAdm_cli_fone_cel2());
            $p_sql->bindValue(":cli_cep",       $cliente->getAdm_cli_cep());
            $p_sql->bindValue(":cli_log",       $cliente->getAdm_cli_log());
            $p_sql->bindValue(":cli_log_cidade",$cliente->getAdm_cli_log_cidade());
            $p_sql->bindValue(":cli_log_bairro",$cliente->getAdm_cli_log_bairro());
            $p_sql->bindValue(":cli_log_uf",    $cliente->getAdm_cli_log_uf());
            $p_sql->bindValue(":cli_log_num",   $cliente->getAdm_cli_log_num());
            $p_sql->bindValue(":cli_log_comp",  $cliente->getAdm_cli_log_comp());
            $p_sql->bindValue(":cli_email",     $cliente->getAdm_cli_email());
            $p_sql->bindValue(":cli_obs",       $cliente->getAdm_cli_obs());
            $p_sql->bindValue(":cli_excluido",  $cliente->getAdm_cli_excluido());

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

    public function Editar_Cliente(PojoCliente $cliente) {
        try {
            $sql = "UPDATE adm_clientes set
                        soma_n1 = :n1,
                        soma_n2 = :n2,
                        soma_total = :soma
                    WHERE soma_id = :soma_id";

            $p_sql = Conexao::getInstance()->prepare($sql);

            $p_sql->bindValue(":n1", $cliente->getN1());
            $p_sql->bindValue(":n2", $cliente->getN2());
            $p_sql->bindValue(":soma", $cliente->getSoma());
            $p_sql->bindValue(":soma_id", $cliente->getSoma_id());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
            GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
        }
    }

    public function Deletar($id) {
        try {
            $sql = "DELETE FROM adm_clientes WHERE soma_id = :soma_id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":soma_id", $id);

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
        }
    }

    public function BuscarListaClientes($ativos) {
        try {
            $sql = "SELECT * FROM adm_clientes WHERE ADM_CLI_EXCLUIDO = :adm_cli_excluido";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":adm_cli_excluido", $ativos);

            $p_sql->execute();
            
            return $p_sql->fetchAll();

        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde." . $e;
        }
    }

    public function BuscarPorID($id) {
        try {
            $sql = "SELECT * FROM adm_clientes WHERE ADM_CLI_ID = :adm_cli_id";
            $p_sql = Conexao::getInstance()->prepare($sql);
            $p_sql->bindValue(":adm_cli_id", $id);
            $p_sql->execute();
            return $this->populaCliente($p_sql->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            print "Ocorreu um erro ao tentar executar esta ação, tente novamente mais tarde.";
        }
    }

    private function populaCliente($row) {
            $pojo = new PojoCliente;

            $pojo->setAdm_cli_id($row['ADM_CLI_ID']);
            $pojo->setAdm_cli_tipo($row['ADM_CLI_TIPO']);
            $pojo->setAdm_cli_cpf_cnpj(f_formatanumero($row['ADM_CLI_CPF_CNPJ']));
            $pojo->setAdm_cli_nome($row['ADM_CLI_NOME']);
            $pojo->setAdm_cli_nome_fant($row['ADM_CLI_NOME_FANT']);
            $pojo->setAdm_cli_dt_cad($row['ADM_CLI_DT_CAD']);
            $pojo->setAdm_cli_dt_nasc($row['ADM_CLI_DT_NASC']);
            $pojo->setAdm_cli_rg($row['ADM_CLI_RG']);
            $pojo->setAdm_cli_grupo_id($row['ADM_CLI_GRUPO_ID']);
            $pojo->setAdm_cli_fone_res($row['ADM_CLI_FONE_RES']);
            $pojo->setAdm_cli_fone_cel1($row['ADM_CLI_FONE_CEL1']);
            $pojo->setAdm_cli_fone_cel2($row['ADM_CLI_FONE_CEL2']);
            $pojo->setAdm_cli_cep($row['ADM_CLI_CEP']);
            $pojo->setAdm_cli_log($row['ADM_CLI_LOG']);
            $pojo->setAdm_cli_log_cidade($row['ADM_CLI_LOG_CIDADE']);
            $pojo->setAdm_cli_log_bairro($row['ADM_CLI_LOG_BAIRRO']);
            $pojo->setAdm_cli_log_uf($row['ADM_CLI_LOG_UF']);
            $pojo->setAdm_cli_log_num($row['ADM_CLI_LOG_NUM']);
            $pojo->setAdm_cli_log_comp($row['ADM_CLI_LOG_COMP']);
            $pojo->setAdm_cli_email($row['ADM_CLI_EMAIL']);
            $pojo->setAdm_cli_obs($row['ADM_CLI_OBS']);
            return $pojo;
        }

    }

?>