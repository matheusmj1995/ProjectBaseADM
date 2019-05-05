<?php 

$mascara_fone 	= "(99) 9999-9999";
$mascara_cel 	= "(99) 9999-9999?9";
$mascara_rg 	= "9.999.999";
$mascara_cpf 	= "999.999.999-99";
$mascara_cnpj 	= "99.999.999/9999-99";
$mascara_data 	= "99/99/9999";
$mascara_cep 	= "99999-999";
$mascara_hora 	= "99:99";

function f_ultimo_id(){
    $ult_id = Conexao::getInstance()->lastInsertID();
    return $ult_id;
}

function f_ajustar_valor_BD($vf_valor){
	$valor = str_replace(".","",$vf_valor);
	$retorno = str_replace(",",".",$valor);
	return $retorno; 
}

function f_ajustar_valor_AP($vf_valor){
	$retorno = number_format($vf_valor,2,",",".");
	return $retorno; 
}

function f_formatadata_BD($data){
    $ano= substr($data, 6);
    $mes= substr($data, 3,-5);
    $dia= substr($data, 0,-8);

    return $ano."-".$mes."-".$dia;
}

function f_formatadata_AP($data){
    $dia= substr($data, 8,2);
    $mes= substr($data, 5,2);
    $ano= substr($data, 0,4);

    return $dia."-".$mes."-".$ano;
}

function f_formatatexto($texto){
	$texto = trim(html_entity_decode($texto));
	//tirando os acentos
	$texto = preg_replace('![áàãâä]+!u','a',$texto);
	$texto = preg_replace('![éèêë]+!u','e',$texto);
	$texto = preg_replace('![íìîï]+!u','i',$texto);
	$texto = preg_replace('![óòõôö]+!u','o',$texto);
	$texto = preg_replace('![úùûü]+!u','u',$texto);
	//parte que tira o cedilha e o ñ
	$texto = preg_replace('![ç]+!u','c',$texto);
	$texto = preg_replace('![ñ]+!u','n',$texto);
	//tirando outros caracteres invalidos
	$texto = preg_replace('[^a-z0-9\-]','-',$texto);
	//tirando espaços
	$texto = str_replace(' ','-',$texto);
	//trocando duplo espaço (hifen) por 1 hifen só
	$texto = str_replace('--','-',$texto);

	return strtolower($texto);
}

function f_formatanumero($texto){

	return preg_replace( '#[^0-9]#', '', $texto );
}

?>