
<?php 
    require_once("../../_conexao_BD/conexao_BD.php");

    require_once("adm_topo.php");
    
    require_once("../_pojo/pojo_clientes.php");
    require_once("../_dao/dao_clientes.php");

    $adm_cli_id = $_REQUEST["adm_cli_id"] ?? 0;

    $instance = DaoCliente::getInstance();

    if ($adm_cli_id > 0) {
        $cli_id = $adm_cli_id;
        $titulo = "Editar Cliente";
        
        $sql_busca = $instance->BuscarPorID($adm_cli_id);

        $adm_cli_tipo       = $sql_busca->getAdm_cli_tipo();
        $adm_cli_cpf_cnpj   = $sql_busca->getAdm_cli_cpf_cnpj();
        $adm_cli_nome       = $sql_busca->getAdm_cli_nome();
        $adm_cli_nome_fant  = $sql_busca->getAdm_cli_nome_fant();
        $adm_cli_dt_cad     = $sql_busca->getAdm_cli_dt_cad();
        $adm_cli_dt_nasc    = f_formatadata_AP($sql_busca->getAdm_cli_dt_nasc());
        $adm_cli_rg         = $sql_busca->getAdm_cli_rg();
        $adm_cli_grupo_id   = $sql_busca->getAdm_cli_grupo_id();
        $adm_cli_fone_res   = $sql_busca->getAdm_cli_fone_res();
        $adm_cli_fone_cel1  = $sql_busca->getAdm_cli_fone_cel1();
        $adm_cli_fone_cel2  = $sql_busca->getAdm_cli_fone_cel2();
        $adm_cli_cep        = $sql_busca->getAdm_cli_cep();
        $adm_cli_log        = $sql_busca->getAdm_cli_log();
        $adm_cli_log_cidade = $sql_busca->getAdm_cli_log_cidade();
        $adm_cli_log_bairro = $sql_busca->getAdm_cli_log_bairro();
        $adm_cli_log_uf     = $sql_busca->getAdm_cli_log_uf();
        $adm_cli_log_num    = $sql_busca->getAdm_cli_log_num();
        $adm_cli_log_comp   = $sql_busca->getAdm_cli_log_comp();
        $adm_cli_email      = $sql_busca->getAdm_cli_email();
        $adm_cli_obs        = $sql_busca->getAdm_cli_obs();
        $adm_cli_excluido   = $sql_busca->getAdm_cli_excluido();
    }else{
        $cli_id = "AUTOMÁTICO";
        $titulo = "Adicionar Cliente";
        $adm_cli_tipo = "F";
    }

    //echo $sql_busca->getAdm_cli_obs();

?>

<section class="content-header">
	<h1>
		<?php echo ($titulo); ?>
        <a href="cad_clientes.php" class="btn btn-sm btn-success pull-right"><i class="fa fa-mail-reply"></i>&nbsp;Lista</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Início</a></li>
        <li><a href="cad_clientes.php">Clientes</a></li>
        <li class="active"><?php echo($titulo); ?></li>
    </ol>        
</section>
<div class="box box-success" style="margin:0px"></div>
<form id="form_cad_cli">
    <div class="form-group">
        <div class="box-body">
            <div class="form-group">
                <div class="col-xs-2 col-md-2">
                    <label>Código</label>
                    <input type="text" class="form-control" style="text-align: center" name="cli_id" value="<?php echo($cli_id) ?>" readonly>
                </div>
                <div class="col-xs-2 col-md-2">
                    <label>Tipo</label>
                    <select id="adm_cli_tipo" name="adm_cli_tipo" class="form-control">
                        <option value="F" <?php if ($adm_cli_tipo == "F") {echo("selected");} ?>>P. Física</option>
                        <option value="J" <?php if ($adm_cli_tipo == "J") {echo("selected");} ?>>P. Jurídica</option>
                    </select>
                </div>                    
                <div class="col-xs-8 col-md-8">
                    <label>Nome</label>
                    <input type="text" class="form-control" id="adm_cli_nome" name="adm_cli_nome" value="<?php echo($adm_cli_nome ?? '') ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2 col-md-2">
                    <label>DT. Nascimento</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="adm_cli_dt_nasc" name="adm_cli_dt_nasc" value="<?php echo($adm_cli_dt_nasc ?? ''); ?>" class="form-control">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <label>CPF / CNPJ</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" id="adm_cli_cpf_cnpj" name="adm_cli_cpf_cnpj" value="<?php echo($adm_cli_cpf_cnpj ?? ''); ?>" class="form-control">
                    </div>
                </div>                
                <div class="col-xs-7 col-md-7">
                    <label>Apelido / Nome Fantasia</label>
                    <input type="text" id="adm_cli_nome_fant" name="adm_cli_nome_fant" value="<?php echo($adm_cli_nome_fant ?? ''); ?>" class="form-control">
                </div>            
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-md-12" style="padding-top:20px">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab_end">Endereço</a></li>
                        <li><a data-toggle="tab" href="#tab_cont">Contato</a></li>
                        <li><a data-toggle="tab" href="#tab_out">Outros</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab_end" class="tab-pane fade in active">
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12">
                                    <h3 style="margin-top: 0px">ENDEREÇO</h3>
                                </div>
                                <div class="col-xs-2 col-md-2">
                                    <label>CEP</label>
                                    <input type="text" class="form-control" id="cep" name="adm_cli_cep" value="<?php echo($adm_cli_cep ?? ''); ?>" onblur="javascript: f_busca_endereco();">
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <label>LOGRADOURO</label>
                                    <input type="text" class="form-control" id="logradouro" name="adm_cli_log" value="<?php echo($adm_cli_log ?? ''); ?>">
                                </div>   
                                <div class="col-xs-4 col-md-4">
                                    <label>CIDADE</label>
                                    <input type="text" class="form-control" id="cidade" name="adm_cli_log_cidade" value="<?php echo($adm_cli_log_cidade ?? ''); ?>">
                                </div>  
                            </div>
                            <div class="form-group">
                                <div class="col-xs-1 col-md-1">
                                    <label>ESTADO</label>
                                    <input type="text" class="form-control" id="estado" name="adm_cli_log_uf" value="<?php echo($adm_cli_log_uf ?? ''); ?>">
                                </div>   
                                <div class="col-xs-3 col-md-3">
                                    <label>BAIRRO</label>
                                    <input type="text" class="form-control" id="bairro" name="adm_cli_log_bairro" value="<?php echo($adm_cli_log_bairro ?? ''); ?>">
                                </div>
                                <div class="col-xs-1 col-md-1">
                                    <label>N°</label>
                                    <input type="text" class="form-control" id="numero" name="adm_cli_log_num" value="<?php echo($adm_cli_log_num ?? ''); ?>">
                                </div>       
                                <div class="col-xs-7 col-md-7">
                                    <label>COMPLEMENTO</label>
                                    <input type="text" class="form-control" id="complemento" name="adm_cli_log_comp" value="<?php echo($adm_cli_log_comp ?? ''); ?>">
                                </div>                                                                                          
                            </div>
                        </div>
                        <div id="tab_cont" class="tab-pane fade">
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12">
                                    <h3 style="margin-top: 0px">CONTATO</h3>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label>Telefone Resi.</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" id="adm_cli_fone_res" name="adm_cli_fone_res" value="<?php echo($adm_cli_fone_res ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label>Celular 1</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" id="adm_cli_fone_cel1" name="adm_cli_fone_cel1" value="<?php echo($adm_cli_fone_cel1 ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label>Celular 2</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" id="adm_cli_fone_cel2" name="adm_cli_fone_cel2" value="<?php echo($adm_cli_fone_cel2 ?? ''); ?>">
                                    </div>
                                </div>   
                                <div class="col-xs-10 col-md-10">
                                    <label>E-mail</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input type="text" class="form-control" id="adm_cli_email" name="adm_cli_email" value="<?php echo($adm_cli_email ?? ''); ?>">
                                    </div>
                                </div>                                                                        
                            </div>
                        </div>
                        <div id="tab_out" class="tab-pane fade">
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12">
                                    <h3 style="margin-top: 0px">OUTROS</h3>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <label>OBSERVAÇÕES</label>
                                    <textarea id="adm_cli_obs" name="adm_cli_obs" value="<?php echo($adm_cli_obs ?? ''); ?>" rows="4" style="min-width:100%;max-width: 100%;"><?php echo $adm_cli_obs ?? ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-12 col-md-12" style="text-align:center;padding:20px">
            <button type="button" onclick="f_enviar_form()" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;GRAVAR</button>
        </div>
    </div>
    <input type="hidden" id="cmd" name="cmd" value="gravar">                    
    <input type="hidden" id="adm_cli_id" name="adm_cli_id" value="<?php echo $adm_cli_id ?>">                    
</form>


<script type="text/javascript">
    $("#adm_cli_dt_nasc").mask("<?php echo $mascara_data; ?>");
    $("#adm_cli_fone_res").mask("<?php echo $mascara_fone; ?>");
    $("#adm_cli_fone_cel1,#adm_cli_fone_cel2").mask("<?php echo $mascara_cel; ?>");
    $("#cep").mask("<?php echo $mascara_cep; ?>");

    
    $("#adm_cli_tipo").on("keyup change", function(e) {
        var vj_tipo = $("#adm_cli_tipo").val();

        if (vj_tipo == "" || vj_tipo == "F") {
            $("#adm_cli_cpf_cnpj").mask("<?php echo $mascara_cpf; ?>");
        }else{
            $("#adm_cli_cpf_cnpj").mask("<?php echo $mascara_cnpj; ?>");   
        }
    }).trigger("change");

    function f_enviar_form(){

        if ($("#adm_cli_nome").val() == "") {
            swal({
                type: 'error',
                title:'Campo NOME em branco!',
                html: 'Informe o NOME do cliente.'
            }).then(function () {      
                setTimeout(function(){
                    $("#adm_cli_nome").focus();
                },50);
            })

        }else if($("#adm_cli_dt_nasc").val() == ""){
            swal({
                type: 'error',
                title:'Campo DATA DE NASCIMENTO em branco!',
                html: 'Informe o DATA DE NASCIMENTO do cliente.'
            }).then(function () {      
                setTimeout(function(){
                    $("#adm_cli_dt_nasc").focus();
                },50);
            }) 

        }else if($("#adm_cli_nome_fant").val() == ""){
            swal({
                type: 'error',
                title:'Campo APELIDO / NOME FANTASIA em branco!',
                html: 'Informe o APELIDO / NOME FANTASIA do cliente.'
            }).then(function () {      
                setTimeout(function(){
                    $("#adm_cli_nome_fant").focus();
                },50);
            }) 

        }else if($("#adm_cli_cpf_cnpj").val() == ""){
            swal({
                type: 'error',
                title:'Campo CPF / CNPJ em branco!',
                html: 'Informe o CPF / CNPJ do cliente.'
            }).then(function () {      
                setTimeout(function(){
                    $("#adm_cli_cpf_cnpj").focus();
                },50);
            })

        }else{

            var url = 'cad_clientes_editar_exe.php';

            $.post(url,$('#form_cad_cli').serialize(),function(data){
                if (data.status == 'sucesso') {
                    $(location).attr('href', 'cad_clientes.php');
                }else{
                    alert('erro');
                }
            },"json");
        }

    }

</script>

<?php 
	require_once("adm_base.php");
?>
