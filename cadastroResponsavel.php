<!DOCTYPE html>
<html>
<head lang="pt-br">
<meta charset="utf-8" />
<title>GoTIC</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.toastmessage-min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.toastmessage.js"></script>
<script src="js/valida-responsavel.js"></script>
</head>
<body>
<?php
$id_orgao = $_GET['idorgao'];
$id_unidade = $_GET['idunidade'];

require("banco/conecta.php");
$sql1 = "SELECT no_orgao FROM orgao WHERE id=".$id_orgao;
$orgao = f_leitura_campo($db, $sql1);

$sql2 = "SELECT no_unidade FROM unidade WHERE id=".$id_unidade;
$unidade = f_leitura_campo($db, $sql2);
?>
	<div id="centro_editar">
	<div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
        	<h4 class="title_cadastro_portais">Cadastro de Responsável</h4>
        </div>
    </div>
	<div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
			<input type="hidden" name="id_orgao" id="id_orgao"  value="<?php echo $id_orgao;?>"/>
            <input type="hidden" name="id_unidade" id="id_unidade"  value="<?php echo $id_unidade;?>"/>
		    <div class="form-horizontal">
				<div id="div_orgao" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Órgão</label>
                        <div class="controls">
						<input type="text" readonly="true" name="no_orgao" id="no_orgao"  style="width:550px;" maxlength="100" value="<?php echo $orgao; ?>" />
						</div>
                </div>
                <div id="div_orgao" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Unidade</label>
                        <div class="controls">
						<input type="text" readonly="true" name="no_unidade" id="no_unidade"  style="width:550px;" maxlength="100" value="<?php echo $unidade; ?>" />
						</div>
                </div>
            	<div id="div_nome" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Nome</label>
                        <div class="controls">
						<input type="text" name="no_responsavel" id="no_responsavel"  style="width:550px;" maxlength="100" required />
						</div>
                </div>
                <div id="div_sigla" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Telefone</label>
						<div class="controls">
                        <input type="text" name="nu_telefone" id="nu_telefone" maxlength="30" />
						</div>
                </div>
				<div id="div_endereco" class="control-group">
                        <label style="font-weight:bold;" class="control-label">E-mail</label>
						<div class="controls">
                        <input type="text" name="no_email" id="no_email" maxlength="100" style="width:500px;"/>
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
                    <input type="submit" value="Cadastrar" name="salvar_responsavel" id="salvar_responsavel" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
                </div>
            </div>
         </form>
    </div>
    </div>
 </body>
 </html>	 
    	
  
        