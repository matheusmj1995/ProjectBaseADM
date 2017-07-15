
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

		$n1	= $_POST["n1"] ?? 0;
		$n2	= $_POST["n2"] ?? 0;

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
		</form>
	
	</section>
<?php include('_app/base.php');?>
