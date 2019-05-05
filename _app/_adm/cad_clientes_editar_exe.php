<?php 
    require_once("../../_conexao_BD/conexao_BD.php");

    require_once("adm_func_gerais.php");
    require_once("../_pojo/pojo_clientes.php");
	require_once("../_dao/dao_clientes.php");

    $resultado = "";
    $cmd = $_REQUEST["cmd"] ?? "";
    $cli_id =  $_REQUEST["adm_cli_id"] ?? 0;

    $cli_tipo       = $_REQUEST["adm_cli_tipo"] ?? "";
    $cli_cpf_cnpj   = $_REQUEST["adm_cli_cpf_cnpj"] ?? "";
    $cli_nome       = $_REQUEST["adm_cli_nome"] ?? "";
    $cli_nome_fant  = $_REQUEST["adm_cli_nome_fant"] ?? "";
    $cli_dt_cad     = $_REQUEST["adm_cli_dt_cad"] ?? "";
    $cli_dt_nasc    = $_REQUEST["adm_cli_dt_nasc"] ?? "";
    $cli_rg         = $_REQUEST["adm_cli_rg"] ?? "";
    $cli_grupo_id   = $_REQUEST["adm_cli_grupo_id"] ?? "";
    $cli_fone_res   = $_REQUEST["adm_cli_fone_res"] ?? "";
    $cli_fone_cel1  = $_REQUEST["adm_cli_fone_cel1"] ?? "";
    $cli_fone_cel2  = $_REQUEST["adm_cli_fone_cel2"] ?? "";
    $cli_cep        = $_REQUEST["adm_cli_cep"] ?? "";
    $cli_log        = $_REQUEST["adm_cli_log"] ?? "";
    $cli_log_cidade = $_REQUEST["adm_cli_log_cidade"] ?? "";
    $cli_log_bairro = $_REQUEST["adm_cli_log_bairro"] ?? "";
    $cli_log_uf     = $_REQUEST["adm_cli_log_uf"] ?? "";
    $cli_log_num    = $_REQUEST["adm_cli_log_num"] ?? "";
    $cli_log_comp   = $_REQUEST["adm_cli_log_comp"] ?? "";
    $cli_email      = $_REQUEST["adm_cli_email"] ?? "";
    $cli_obs        = $_REQUEST["adm_cli_obs"] ?? "";
    $cli_excluido   = $_REQUEST["adm_cli_excluido"] ?? "N";

    if ($cmd == "gravar") {

        $pojo = new PojoCliente;

        $pojo->setAdm_cli_id($cli_id);
        $pojo->setAdm_cli_tipo($cli_tipo);
        $pojo->setAdm_cli_cpf_cnpj(f_formatanumero($cli_cpf_cnpj));
        $pojo->setAdm_cli_nome($cli_nome);
        $pojo->setAdm_cli_nome_fant($cli_nome_fant);
        $pojo->setAdm_cli_dt_cad(f_formatadata_BD($cli_dt_cad));
        $pojo->setAdm_cli_dt_nasc(f_formatadata_BD($cli_dt_nasc));
        $pojo->setAdm_cli_rg($cli_rg);
        $pojo->setAdm_cli_grupo_id($cli_grupo_id);
        $pojo->setAdm_cli_fone_res($cli_fone_res);
        $pojo->setAdm_cli_fone_cel1($cli_fone_cel1);
        $pojo->setAdm_cli_fone_cel2($cli_fone_cel2);
        $pojo->setAdm_cli_cep($cli_cep);
        $pojo->setAdm_cli_log($cli_log);
        $pojo->setAdm_cli_log_cidade($cli_log_cidade);
        $pojo->setAdm_cli_log_bairro($cli_log_bairro);
        $pojo->setAdm_cli_log_uf($cli_log_uf);
        $pojo->setAdm_cli_log_num($cli_log_num);
        $pojo->setAdm_cli_log_comp($cli_log_comp);
        $pojo->setAdm_cli_email($cli_email);
        $pojo->setAdm_cli_obs($cli_obs);
        $pojo->setAdm_cli_excluido($cli_excluido);

        $instance = DaoCliente::getInstance();

        if ($cli_id > 0) {
            $instance->Editar_Soma($pojo);
            $ult_id = $cli_id;
            $redirect = "cad_clientes_editar.php?adm_cli_id=" . $ult_id;
        }else{
            $ult_id = $instance->Inserir_Cliente($pojo);
            $resultado = array("status"=>"sucesso");
        }
    }else{
        $ult_id = $cli_id;
    }

    $resultado = json_encode($resultado);

    echo($resultado);
?>