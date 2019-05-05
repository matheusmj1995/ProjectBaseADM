		<script type="text/javascript" src="../../bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
	    <!-- DATA TABES SCRIPT -->
	    <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
	    <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	    
		<script type="text/javascript">
			$(function () {
				$("#example1").dataTable();
				$('#example2').dataTable({
					"bPaginate": true,
					"bLengthChange": false,
					"bFilter": false,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": false
				});
			});			
			function f_busca_endereco(){
				$(document).ready(function(){
				    $("#cep").blur(function(e){
				        if($.trim($("#cep").val()) != ""){
				            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
				                if(resultadoCEP["resultado"]){
				                	var separa_log = "";

				                	if (unescape(resultadoCEP["tipo_logradouro"]) != "" && unescape(resultadoCEP["logradouro"]) != "") {
				                		var separa_log = ": "
				                	}

				                    $("#logradouro").val(unescape(resultadoCEP["tipo_logradouro"]) + separa_log + unescape(resultadoCEP["logradouro"]));
				                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
				                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
				                    $("#estado").val(unescape(resultadoCEP["uf"]));
				                }else{
				                    alert("Não foi possivel encontrar o endereço");
				                }
				            });             
				        }
				    })
				});
			}
		</script>


	</body>
</html>