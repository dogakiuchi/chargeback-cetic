<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GoTIC</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.toastmessage-min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.toastmessage.js"></script>
<script src="js/valida-orgao.js"></script>
</head>
<body>
	<div id="centro_editar">
	<div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
        	<h3 class="title_cadastro_portais">Cadastro de Órgãos</h3>
        </div>
    </div>
	<div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
		<input type="hidden" name="acao" id="acao"  value="cadastrar"/>
		    <div class="form-horizontal">
            	<div id="div_nome" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Nome do Órgão</label>
                        <div class="controls">
						<input type="text" name="no_orgao" id="no_orgao"  style="width:550px; maxlength="100" required />
						</div>
                </div>
                <div id="div_sigla" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Sigla</label>
						<div class="controls">
                        <input type="text" name="no_sigla" id="no_sigla" maxlength="30" required />
						</div>
                </div>
                <div id="div_tipo" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Tipo</label>
					    <div class="controls">
                        <input type="radio" name="tipo" id="tp_direta" value="0" style="margin-top:1px;" checked="checked" /><span> Administração Direta </span>
                        <input type="radio" name="tipo" id="tp_indireta" value="1" style="margin-top:1px;" /><span> Administração Indireta </span> 
					    </div>					   
                </div>
                <div id="div_status" class="control-group">
                    	 <label style="font-weight:bold;" class="control-label"> Status</label>
						 <div class="controls">
                         <input type="radio" name="status" id="ativo" value="1" style="margin-top:1px;" checked="checked" /> <span> Ativo </span>
                         <input type="radio" name="status" id="inativo" value="0" style="margin-top:1px;" /> <span> Inativo </span>
						 </div>
                </div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Cadastrar" name="salvar_orgao" id="salvar_orgao" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
                </div>
            </div>
         </form>
    </div>
    </div>
 </body>
 </html>	 
    	
  
        