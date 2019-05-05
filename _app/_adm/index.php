
<?php 

	require_once('adm_topo.php');

    require_once("../../_conexao_BD/conexao_BD.php");
    require_once("adm_func_gerais.php");
    
    /*require_once("../_pojo/pojo_soma.php");
	require_once("../_dao/dao_soma.php");

	$soma_id	= $_REQUEST["soma_id"] ?? 0;

    $instance = DaoSoma::getInstance();

    if ($soma_id > 0) {
    	$sql_busca = $instance->BuscarPorID($soma_id);
		$n1 = f_ajustar_valor_AP($sql_busca->getN1());
		$n2 = f_ajustar_valor_AP($sql_busca->getN2());
		$soma = f_ajustar_valor_AP($sql_busca->getSoma());
    	
    }else{
		$n1	= $_REQUEST["n1"] ?? 0;
		$n2	= $_REQUEST["n2"] ?? 0;
		$soma = ($n1 + $n2);
    }
	*/

	$n1	= $_REQUEST["n1"] ?? 0;
	$n2	= $_REQUEST["n2"] ?? 0;
?>

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Painel de Controle
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Início</a></li>
			<li class="active">Painel de Controle</li>
		</ol>
	</section>
	<section class="content">
		<form action="index_exe.php" method="POST">
			<div class="form-group">
				<div class="col-md-3">
					<label for="">
						Digite o Primeiro N°
					</label><br>
					<input type="text" id="n1" name="n1" value="<?= $n1 ?>">
				</div>
				<div class="col-md-3">
					<label for="">
						Digite o Segundo N°
					</label><br>
					<input type="text" id="n2" name="n2" value="<?= $n2 ?>">					
				</div>				
				<div class="col-md-6">
					<label for=""></label><br>
					<button class="btn btn-sm btn-success" type="submit">Somar</button>
				</div>
				<div class="col-md-12">
					<br><label for="">
					<span id="soma" name="soma"><?php// echo($soma);?></span>
					</label>				
				</div>	
			</div>
			<input type="hidden" id="cmd" name="cmd" value="gravar">					
			<input type="hidden" id="soma_id" name="soma_id" value="<?=$soma_id?>">					
		</form>
	
	</section>

<?php 
	require_once('adm_base.php');
?>
