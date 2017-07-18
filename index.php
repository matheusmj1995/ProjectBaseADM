
<?php include('_app/topo.php');?>
	
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
	<?php 

		$soma_id	= $_REQUEST["soma_id"] ?? 0;
		$n1	= $_REQUEST["n1"] ?? 0;
		$n2	= $_REQUEST["n2"] ?? 0;

		$soma = ($n1 + $n2);
	?>
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
						<?php 
							echo "A soma é " . $soma;
						?>
					</label>				
				</div>	
			</div>
			<input type="hidden" id="soma_id" name="soma_id" value="<?php $soma_id ?>">					
		</form>
	
	</section>
<?php include('_app/base.php');?>
