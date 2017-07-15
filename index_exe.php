<?php 
	require_once("_conexao_BD/conexao_BD.php");

	$n1	= $_POST["n1"] ?? 0;
	$n2	= $_POST["n2"] ?? 0;

	$soma = ($n1 + $n2);

    try {
        $sql = 
        	"INSERT INTO teste (		
            	soma_n1,
            	soma_n2,
            	soma_total
            )VALUES(
          		:n1,
          		:n2,
            	:soma
            )";

        $p_sql = Conexao::getInstance()->prepare($sql);

        $p_sql->bindValue(":n1", $n1);
        $p_sql->bindValue(":n2", $n2);
        $p_sql->bindValue(":soma", $soma);

		if ($p_sql->execute()){ 
			$ult_id = f_ultimo_id();
		}else{
			echo "A inserção não se realizou"; 
		}

        $redirect = "index.php?soma_id=".$ult_id;
        header("location: $redirect");

    } catch (Exception $e) {
        print "Ocorreu um erro ao tentar executar esta ação, foi gerado um LOG do mesmo, tente novamente mais tarde.";
        GeraLog::getInstance()->inserirLog("Erro: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
    }

?>