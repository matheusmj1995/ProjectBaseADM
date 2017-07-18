<?php 
    require_once("_conexao_BD/conexao_BD.php");

    require_once("_app/_pojo/pojo_soma.php");
	require_once("_app/_dao/dao_soma.php");

    $soma_id = $_REQUEST["soma_id"] ?? 0;
	$n1	= $_REQUEST["n1"] ?? 0;
	$n2	= $_REQUEST["n2"] ?? 0;

	$soma = ($n1 + $n2);

    $pojo = new PojoSoma;
    $pojo->setSoma_id($soma_id);
    $pojo->setN1($n1);
    $pojo->setN2($n2);
    $pojo->setSoma($soma);   

    $instance = DaoSoma::getInstance();

    $ult_id = $instance->Inserir_Soma($pojo);


    $redirect = "index.php?soma_id=" . $ult_id;
    header("location: $redirect");


?>