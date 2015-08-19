<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GoTIC</title>
<link  type="text/css"rel="stylesheet" href="css/estilo.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/chosen.css" rel="stylesheet" media="screen">
<link href="css/jquery.toastmessage-min.css" rel="stylesheet" type="text/css" />
<link href="css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.toastmessage.js"></script>
<script src="js/jquery-ui-1.10.3.custom.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/chosen.jquery.js"></script>

<script>
	$(document).ready(function(){
		$("#salvar_portal").click(function(){
			if ($("#no_orgao").val()=="" || $("#no_orgao").val()==null){
					$("#div_orgao").addClass("error");
					$("#no_orgao").addClass("inputError");
					return false;		
			}else if ($("#no_site").val()=="" || $("#no_site").val()==null){
					$("#div_no_site").addClass("error");
					$("#no_site").addClass("inputError");
					return false;		
			}else if ($("#ip_html").val()=="" || $("#ip_html").val()==null){
					$("#div_ip_html").addClass("error");
					$("#ip_html").addClass("inputError");
					return false;	
			}else if ($("#ds_website").val()=="" || $("#ds_website").val()==null){
					$("#div_ds_website").addClass("error");
					$("#ds_website").addClass("inputError");
					return false;	
			}else {	
			        //alert("Eu sou um alert!");
					var acao = 'cadastrar_portal';
					var tp_portal = "";
					var st_token = "";
					if (document.getElementById("tp_portal").checked == true)
						tp_portal = "PI";
					else if (document.getElementById("tp_hotsite").checked == true)
						tp_portal= "HS";
					else 
						tp_portal = "Outros";
						
					if (document.getElementById("st_token_sim").checked == true)
						st_token = "SIM";
					else 
						st_token = "NÃO";
						
					$.ajax({
						url: "ajax/ajax_cadastrar.php",
						type: 'POST',
						data: {
							ID_ORGAO: $("#no_orgao").val(),
							NO_DNS: $("#no_dns").val(),
							NO_SITE: $("#no_site").val(),
							CODIGO_ANALYTICS: $("#codigo_analytics").val(),
							IP_HTML: $("#ip_html").val(),
							IP_BANCO: $("#ip_banco").val(),
							USUARIO_BANCO: $("#usuario_banco").val(),
							PWD_BANCO: $("#pwd_banco").val(),
							ESQUEMA_BANCO: $("#esquema_banco").val(),
							DS_WEBSITE: $("#ds_website").val(),
							TP_PORTAL: tp_portal,
							PREFIXO_TABELA: $("#prefixo_tabela").val(),
							ST_TOKEN: st_token,
							USUARIO_ANALYTICS: $("#usuario_analytics").val(),
							SENHA_ANALYTICS: $("#senha_analytics").val(),
							NO_RESPONSAVEL: $("#no_responsavel").val(),
							RESP_TELEFONE: $("#resp_telefone").val(),
							acao: acao
						},
						dataType: 'json',
						success: function(data){
							var resultado = data[0].resultado;
							if (resultado == 1){
								$().toastmessage("showErrorToast", "Erro! Este portal já existe");
								return false;	
							}
							
							if (resultado == 0){
								$().toastmessage("showSuccessToast", "Cadastro efetuado!");	
								$("input").not("#salvar_portal, #voltar").val("");
							}
						}
					});
			}
		});
		
		$("input").change(function(){
			$(".input").removeClass("error");
			$("input").removeClass("inputError");
		});
	});
</script>
</head>
<body>
	<div id="centro_editar">
	<div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
        	<h3 class="title_cadastro_portais">Cadastro de Site</h3>
        </div>
    </div>
	<div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
		 <div class="form-horizontal">
                <div id="div_orgao" class="control-group">
                         <label style="font-weight:bold;" class="control-label">Órgão</label>				
                         <div class="controls">
                            <select data-placeholder="SELECIONE O ÓRGÃO" class="chosen-select" style="width:550px;" tabindex="2" name="no_orgao" id="no_orgao">
								<option value="-"></option>
                                <?php
								    require("banco/conecta.php");
								    $sql = "SELECT id, no_orgao FROM orgao WHERE status = 1 ORDER BY no_orgao";
				                    $result = f_leitura($db,$sql);
                                    if ($result == true){
                                        
                                        foreach ($result as $linha) {
                                            echo "<option value='".$linha[0]."' > ".$linha[1]." </option>";
                                            
                                        }
                                    }
								?>
                            </select>
						</div>
				</div>
                <div id="div_no_site" class="control-group ">
                        <label style="font-weight:bold;" class="control-label">Nome do site</label>
						<div class="controls">
                        <input type="text" name="no_site" id="no_site" maxlength="100" style="width:500px;" required />
						</div>
                </div>
				<div id="div_ds_website" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Endereço do Site</label>
						<div class="controls">
                        <input type="text" name="ds_website" id="ds_website" maxlength="45" required />
						</div>
                </div>
                <div id="div_ip_html" class="control-group ">
                        <label style="font-weight:bold;" class="control-label">Caminho Servidor</label>
						<div class="controls">
                        <input type="text" name="ip_html" id="ip_html" maxlength="50" required />
						</div>
                </div>
				<div id="div_tp_portal" class="control-group">
                    	<label  style="font-weight:bold;" class="control-label">Tipo de Site</label>
						<div class="controls">
                           <input type="radio" name="tp_portal" id="tp_portal" value="PI" checked="checked" />Portal Institucional
                           <input type="radio" name="tp_portal" id="tp_hotsite" value="HS"  />Hotsite
                           <input type="radio" name="tp_portal" id="tp_outros" value="Outros"  />Outros
                        </div>
                </div>
				<hr/>
				<!--Só preencher se for portal institucional-->
				<div id="div_publicador" class="control-group">
                        <label style="font-weight:bold;" class="control-label" >Endereço do Publicador</label>
						<div class="controls">
                           <input type="text" name="no_dns" id="no_dns" maxlength="100" style="width:500px;" />
						</div>
                </div>
				<!--Só preencher se for portal institucional-->
                 <div id="div_st_token" class="control-group">
                    	<label  style="font-weight:bold;" class="control-label">Necessita Token de acesso?</label>
						<div class="controls">
                           <input type="radio" name="st_token" id="st_token_sim" value="SIM" checked="checked" />SIM
                           <input type="radio" name="st_token" id="st_token_nao" value="NÃO" />NÃO
						</div>
                </div>
                <div id="div_usuario_analytics" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Conta Analytics</label>
						<div class="controls">
                        <input type="text" name="usuario_analytics" id="usuario_analytics" maxlength="100" />
						</div>
                </div>
                <div id="div_senha_analytics" class="control-group ">
                        <label style="font-weight:bold;" class="control-label">Senha Google Analytics</label>
						<div class="controls">
                        <input type="text" name="senha_analytics" id="senha_analytics" maxlength="100" />
						</div>
                </div>
                <div id="div_codigo_analytics" class="control-group ">
                        <label style="font-weight:bold;" class="control-label">Código Google Analytics</label>
						<div class="controls">
                        <input type="text" name="codigo_analytics" id="codigo_analytics" maxlength="45" />
						</div>
                </div>
				<hr/>
            	<div id="div_ip_banco" class="control-group">
                        <label  style="font-weight:bold;" class="control-label">IP Banco</label>
						<div class="controls">
                        <input type="text" name="ip_banco" id="ip_banco" maxlength="15" />
						</div>
                </div>
                <div id="div_usuario_banco" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Usuário do Banco</label>
						<div class="controls">
                        <input type="text" name="usuario_banco" id="usuario_banco" maxlength="45" />
						</div>
                </div>
                <div id="div_senha_banco" class="control-group">
                        <label  style="font-weight:bold;" class="control-label">Senha do Banco</label>
						<div class="controls">
                        <input type="text" name="pwd_banco" id="pwd_banco" maxlength="45"  />
						</div>
                </div>
                <div id="div_esquema_banco" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Schema do Banco</label>
						<div class="controls">
                        <input type="text" name="esquema_banco" id="esquema_banco" maxlength="45" />
						</div>
                </div>
                <div id="div_prefixo_tabela" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Prefixo de tabela</label>
						<div class="controls">
                        <input type="text" name="prefixo_tabela" id="prefixo_tabela" maxlength="45" />
						</div>
                </div>
                <div id="div_no_responsavel" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Responsável</label>
						<div class="controls">
                        <input type="text" name="no_responsavel" id="no_responsavel" maxlength="45" />
						</div>
                </div>
                <div id="div_resp_telefone" class="control-group">		
						<label style="font-weight:bold;" class="control-label">Número Responsável </label>
						<div class="controls">
						<input type="text" name="resp_telefone" id="resp_telefone" maxlength="45" />
						</div>
                </div>
                <div class="control-group">
					<div class="controls">
						<input type="submit" value="Cadastrar" name="salvar_portal" id="salvar_portal" class="btn btn-primary" />
						<a  style="margin-left: 10px;" href="index.php"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
					</div>
				</div>
            </div>
         </form>
    </div>
    </div>
   <script type="text/javascript">

      $(".chosen-select").chosen();

  </script>
 </body>
 </html>	 
    	
  
        