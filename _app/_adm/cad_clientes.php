
<?php 
    require_once("../../_conexao_BD/conexao_BD.php");

	require_once("adm_topo.php");
    require_once("adm_func_gerais.php");
    
    require_once("../_pojo/pojo_clientes.php");
	require_once("../_dao/dao_clientes.php");

?>
<section class="content-header">
	<h1>
		Clientes
		<a class="btn btn-sm btn-success pull-right" href="cad_clientes_editar.php?adm_cli_id=0"><i class="fa fa-plus"></i>&nbsp;Adicionar</a>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Início</a></li>
		<li class="active">Clientes</li>
	</ol>
</section>
<div class="box box-success" style="margin:0px"></div>
<div class="box-body">
	<div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
		<div class="row">
			<div class="col-xs-6"></div>
			<div class="col-xs-6"></div>
		</div>
		<table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
			<thead>
				<tr role="row">
					<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">
						Código
					</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
						CPF / CNPJ
					</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
						Nome
					</th>
					<th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
						Nome Fantasia
					</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">
                        Cidade/UF
                    </th>                    
					<th style="background:transparent;" colspan='1'>
						Opções
					</th>
				</tr>					
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">

                <?php 
                    $instance = DaoCliente::getInstance();

                    $sql_busca = $instance->BuscarListaClientes('N');

                    foreach ($sql_busca as $row)
                     {
                        echo"<tr class='odd'>";
                        echo "<td class='sorting_1' colspan='1'>" . $row["ADM_CLI_ID"] . "</td>" ;
                        echo "<td class='sorting_1' colspan='1'>" . $row["ADM_CLI_CPF_CNPJ"] . "</td>" ;
                        echo "<td class='sorting_1' colspan='1'>" . $row["ADM_CLI_NOME"] . "</td>" ;
                        echo "<td class='sorting_1' colspan='1'>" . $row["ADM_CLI_NOME_FANT"] . "</td>" ;
                        echo "<td class='sorting_1' colspan='1'>" . $row["ADM_CLI_LOG_CIDADE"] . "/" . $row["ADM_CLI_LOG_UF"] . "</td>" ;
                        echo "<td class='sorting_1' colspan='1'>" .
                                "<a type='submit' class='btn btn-sm btn-success' href='cad_clientes_editar.php?adm_cli_id=" . $row["ADM_CLI_ID"] . "'>Editar</a>" .
                                "<a type='submit' class='btn btn-sm btn-default'>Excluir</a>" .
                             "</td>" ;
                        echo"</tr>";
                     }


                    //$adm_cli_id          = $sql_busca->getAdm_cli_id();
                    //$adm_cli_tipo        = $sql_busca->getAdm_cli_tipo();
                    //$adm_cli_cpf_cnpj    = $sql_busca->getAdm_cli_cpf_cnpj();
                    //$adm_cli_nome        = $sql_busca->getAdm_cli_nome();
                    //$adm_cli_nome_fant   = $sql_busca->getAdm_cli_nome_fant();
                    //$adm_cli_dt_cad      = $sql_busca->getAdm_cli_dt_cad();
                    //$adm_cli_dt_nasc     = $sql_busca->getAdm_cli_dt_nasc();
                    //$adm_cli_rg          = $sql_busca->getAdm_cli_rg();
                    //$adm_cli_grupo_id    = $sql_busca->getAdm_cli_grupo_id();
                    //$adm_cli_fone_res    = $sql_busca->getAdm_cli_fone_res();
                    //$adm_cli_fone_cel1   = $sql_busca->getAdm_cli_fone_cel1();
                    //$adm_cli_fone_cel2   = $sql_busca->getAdm_cli_fone_cel2();
                    //$adm_cli_cep         = $sql_busca->getAdm_cli_cep();
                    //$adm_cli_log         = $sql_busca->getAdm_cli_log();
                    //$adm_cli_log_cidade  = $sql_busca->getAdm_cli_log_cidade();
                    //$adm_cli_log_bairro  = $sql_busca->getAdm_cli_log_bairro();
                    //$adm_cli_log_uf      = $sql_busca->getAdm_cli_log_uf();
                    //$adm_cli_log_num     = $sql_busca->getAdm_cli_log_num();
                    //$adm_cli_log_comp    = $sql_busca->getAdm_cli_log_comp();
                    //$adm_cli_email       = $sql_busca->getAdm_cli_email();
                    //$adm_cli_obs         = $sql_busca->getAdm_cli_obs();
                    //$adm_cli_excluido    = $sql_busca->getAdm_cli_excluido();


                ?>
            </tbody>					
		</table>
	</div>
</div>
<?php 
	require_once("adm_base.php");
?>
