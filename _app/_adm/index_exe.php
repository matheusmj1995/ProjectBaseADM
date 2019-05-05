<?php 
    require_once("../../_conexao_BD/conexao_BD.php");

    require_once("adm_func_gerais.php");
    require_once("../_pojo/pojo_soma.php");
	require_once("../_dao/dao_soma.php");

    $cmd = $_REQUEST["cmd"] ?? "";

    $soma_id =  $_REQUEST["soma_id"] ?? 0;
    $n1 =   f_ajustar_valor_BD($_REQUEST["n1"] ?? 0);
    $n2 =   f_ajustar_valor_BD($_REQUEST["n2"] ?? 0);

    $soma = $n1 + $n2;

    if ($cmd == "gravar") {
        
        $pojo = new PojoSoma;
        $pojo->setSoma_id($soma_id);
        $pojo->setN1($n1);
        $pojo->setN2($n2);
        $pojo->setSoma($soma);   

        $instance = DaoSoma::getInstance();
        if ($soma_id > 0) {
            $instance->Editar_Soma($pojo);
            $ult_id = $soma_id;
        }else{
            $ult_id = $instance->Inserir_Soma($pojo);
        }
    }else{
        $ult_id = $soma_id;
    }



    $redirect = "index.php?soma_id=" . $ult_id;
    header("location: $redirect");


?>