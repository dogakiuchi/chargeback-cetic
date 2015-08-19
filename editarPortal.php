<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Portais do Distrito Federal</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.toastmessage-min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/jquery.toastmessage.js"></script>
<style>
	body{background:#DFE9E5}
	#inputs_web{float:left;}
	#inputs_banco{float:left; margin-left: 10px;}
</style>
<script>
	$(document).ready(function(){
		$("#salvar_portal").click(function(){
			if ($("#no_dns").val()=="" || $("#no_dns").val()==null){
				$("#div_publicador").addClass("error");
				$("#no_dns").addClass("inputError");
				return false;	
			} else if ($("#no_site").val()=="" || $("#no_site").val()==null){
					$("#div_no_site").addClass("error");
					$("#no_site").addClass("inputError");
					return false;		
			} else if ($("#codigo_analytics").val()=="" || $("#codigo_analytics").val()==null){
					$("#div_codigo_analytics").addClass("error");
					$("#codigo_analytics").addClass("inputError");
					return false;
			} else if ($("#ip_html").val()=="" || $("#ip_html").val()==null){
					$("#div_ip_html").addClass("error");
					$("#ip_html").addClass("inputError");
					return false;	
			} else if ($("#ip_banco").val()=="" || $("#ip_banco").val()==null){
					$("#div_ip_banco").addClass("error");
					$("#ip_banco").addClass("inputError");
					return false;	
			} else if ($("#usuario_banco").val()=="" || $("#usuario_banco").val()==null){
					$("#div_usuario_banco").addClass("error");
					$("#usuario_banco").addClass("inputError");
					return false;	
			} else if ($("#pwd_banco").val()=="" || $("#pwd_banco").val()==null){
					$("#div_senha_banco").addClass("error");
					$("#pwd_banco").addClass("inputError");
					return false;	
			} else if ($("#esquema_banco").val()=="" || $("#esquema_banco").val()==null){
					$("#div_esquema_banco").addClass("error");
					$("#esquema_banco").addClass("inputError");
					return false;
			} else if ($("#ds_website").val()=="" || $("#ds_website").val()==null){
					$("#div_ds_website").addClass("error");
					$("#ds_website").addClass("inputError");
					return false;	
			} else if ($("#prefixo_tabela").val()=="" || $("#prefixo_tabela").val()==null){
					$("#div_prefixo_tabela").addClass("error");
					$("#prefixo_tabela").addClass("inputError");
					return false;	
			} else if ($("#usuario_analytics").val()=="" || $("#usuario_analytics").val()==null){
					$("#div_usuario_analytics").addClass("error");
					$("#usuario_analytics").addClass("inputError");
					return false;	
			} else if ($("#senha_analytics").val()=="" || $("#senha_analytics").val()==null){
					$("#div_senha_analytics").addClass("error");
					$("#senha_analytics").addClass("inputError");
					return false;	
			} else {
				var acao = "editar_portal";	
				var tp_portal = "";
				var st_token = "";
					if (document.getElementById("tp_portal_ra").checked == true)
						tp_portal = "RA";
					else if (document.getElementById("tp_portal_secretaria").checked == true)
						tp_portal= "Secretaria";
					else 
						tp_portal = "Outros";
						
					if (document.getElementById("st_token_sim").checked == true)
						st_token = "SIM";
					else 
						st_token = "NÃO";
						
				$.ajax({
					url: 'ajax/ajax_editar.php',
					type: 'POST',
					data: {
						NO_DNS: $("#no_dns").val(),
						NO_SITE: $("#no_site").val(),
						PERFIL_ANALYTICS: $("#perfil_analytics").val(),
						CODIGO_ANALYTICS: $("#codigo_analytics").val(),
						IP_HTML: $("#ip_html").val(),
						IP_BANCO: $("#ip_banco").val(),
						USUARIO_BANCO: $("#usuario_banco").val(),
						PWD_BANCO: $("#pwd_banco").val(),
						ESQUEMA_BANCO: $("#esquema_banco").val(),
						DS_WEBSITE: $("#ds_website").val(),
						TP_PORTAL: tp_portal,
						ID_PORTAL: $("#id_portal").val(),
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
						if (resultado===0)
							$().toastmessage("showSuccessToast","Portal alterado!");	
					}
				});
			}
		});
		
		$("input").change(function(){
			$(".input").removeClass("error");
			$("input").removeClass("inputError");
		});
		
		$("#voltar").click(function(){
			parent.$.fn.colorbox.close();
		});
	});
</script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM dns WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="centro_editar">
        <div class="navbar" style="margin-top:20px;">
            <div class="navbar-inner">
                <h1 class="title_cadastro_portais">Editar Portal</h1>
            </div>
        </div>
    </div>
    <div id="form_cadastro">
        <br /> <br />
        <form name="form" method="post" action="" onsubmit="return false;">
        	<input type="hidden" name="id_portal" id="id_portal" value="<?php echo $ID; ?>" />
        	<div id="inputs_web">
            	<h3>Site</h3>
            	<div id="div_publicador" class="controls control-group input">
                    <label>
                        <b>Publicador</b> <br />
                        <input type="text" name="no_dns" id="no_dns" class="span6" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </label>
                </div>
                <div id="div_no_site" class="controls control-group input">
                    <label>
                        <b>Nome do site</b> <br />
                        <input type="text" name="no_site" id="no_site" class="span6" maxlength="100" value="<?php echo $res[0][2]; ?>" required />
                    </label>
                </div>
                 <div id="div_usuario_analytics" class="controls control-group input">
                    <label>
                        <b>Usuário Google Analytics</b> <br />
                        <input type="text" name="usuario_analytics" id="usuario_analytics" class="span6" maxlength="100" value="<?php echo $res[0][13]; ?>" required />
                    </label>
                </div>
                <div id="div_senha_analytics" class="controls control-group input">
                    <label>
                        <b>Senha Google Analytics</b> <br />
                        <input type="text" name="senha_analytics" id="senha_analytics" class="span6" maxlength="100" value="<?php echo $res[0][14]; ?>" required />
                    </label>
                </div>
                <div id="div_codigo_analytics" class="controls control-group input">
                    <label>
                        <b>Código Google Analytics</b> <br />
                        <input type="text" name="codigo_analytics" id="codigo_analytics" class="span6" maxlength="45" value="<?php echo $res[0][3]; ?>" required />
                    </label>
                </div>
                <div id="div_ip_html" class="controls control-group input">
                    <label>
                        <b>Caminho Servidor</b> <br />
                        <input type="text" name="ip_html" id="ip_html" maxlength="100" class="span6" value="<?php echo $res[0][4]; ?>" required />
                    </label>
                </div>
                 <div id="div_ds_website" class="controls control-group input">
                    <label>
                        <b>URL Produção</b> <br />
                        <input type="text" name="ds_website" id="ds_website" class="span6" maxlength="45" value="<?php echo $res[0][9]; ?>" required />
                    </label>
                </div>
                <div id="div_tp_portal" class="controls control-group">
                    	<b>Tipo do Portal</b> <br />
                       <span> RA </span> <input type="radio" name="tp_portal" id="tp_portal_ra" value="RA" style="margin-top:1px;" <?php if ($res[0][10]=='RA') echo "checked='checked'"; ?> />
                       <span> Secretaria </span> <input type="radio" name="tp_portal" id="tp_portal_secretaria" value="Secretaria" style="margin-top:1px;" <?php if ($res[0][10]=='Secretaria') echo "checked='checked'"; ?> />
                       <span> Outros </span> <input type="radio" name="tp_portal" id="tp_portal_outros" value="Outros" style="margin-top:1px;" <?php if ($res[0][10]=='Outros') echo "checked='checked'"; ?> /> 
                </div>
                 <div id="div_st_token" class="controls control-group">
                    	<b>Token</b> <br />
                        <span> SIM </span> <input type="radio" name="st_token" id="st_token_sim" value="SIM" style="margin-top:1px;" <?php if ($res[0][12] == "SIM") {echo "checked='checked'"; } ?> />
                       <span> NÃO </span> <input type="radio" name="st_token" id="st_token_nao" value="NÃO" style="margin-top:1px;" <?php if ($res[0][12] == "NÃO") {echo "checked='checked'";} ?> />
                </div>
            </div>
            <div id="inputs_banco">
            	<h3>Conexões Banco</h3>
            	<div id="div_ip_banco" class="controls control-group input">
                    <label>
                        <b>IP Banco</b> <br />
                        <input type="text" name="ip_banco" id="ip_banco" class="span4" maxlength="15" value="<?php echo $res[0][5]; ?>" required />
                    </label>
                </div>
                <div id="div_usuario_banco" class="controls control-group input">
                    <label>
                        <b>Usuário do Banco</b> <br />
                        <input type="text" name="usuario_banco" id="usuario_banco" class="span4" maxlength="45" value="<?php echo $res[0][6]; ?>" required />
                    </label>
                </div>
                <div id="div_senha_banco" class="controls control-group input">
                    <label>
                        <b>Senha do Banco</b> <br />
                        <input type="text" name="pwd_banco" id="pwd_banco" class="span4" maxlength="45" value="<?php echo $res[0][7]; ?>" required />
                    </label>
                </div>
                <div id="div_esquema_banco" class="controls control-group input">
                    <label>
                        <b>Esquema do Banco</b> <br />
                        <input type="text" name="esquema_banco" id="esquema_banco" class="span4" maxlength="45" value="<?php echo $res[0][8]; ?>" required />
                    </label>
                </div>
                <div id="div_prefixo_tabela" class="controls control-group input">
                    <label>
                        <b>Prefixo de tabela</b> <br />
                        <input type="text" name="prefixo_tabela" id="prefixo_tabela" class="span4" maxlength="45" value="<?php echo $res[0][11]; ?>" required />
                    </label>
                </div>
                 <div id="div_no_responsavel" class="controls control-group input">
                    <label>
                        <b>Responsável</b> <br />
                        <input type="text" name="no_responsavel" id="no_responsavel" class="span4" maxlength="45" value="<?php echo $res[0][12]; ?>" />
                    </label>
                </div>
                <div id="div_resp_telefone" class="controls control-group input">
                    <label>
                        <b>Número Responsável</b> <br />
                        <input type="text" name="resp_telefone" id="resp_telefone" class="span4" maxlength="45" value="<?php echo $res[0][13]; ?>" />
                    </label>
                </div>
                	<br />
                    <input type="submit" value="Salvar" name="salvar_portal" id="salvar_portal" class="btn btn-primary" />
                    <a style="margin-left: 10px;" href="index.php"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
                
            </div>
            
         </form>
    </div>
    </div>
</body>
</html>