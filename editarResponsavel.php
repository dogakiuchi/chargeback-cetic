<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>GoTIC</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.toastmessage-min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/jquery.toastmessage.js"></script>
<script src="js/valida-responsavel.js"></script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM responsavel WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="centro_editar">
        <div class="navbar" style="margin-top:20px;">
            <div class="navbar-inner">
                <h4 class="title_cadastro_portais">Editar Responsável</h4>
            </div>
        </div>
    </div>
    <div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
            <input type="hidden" name="id_responsavel" id="id_responsavel" value="<?php echo $ID; ?>" />
            <input type="hidden" name="id_orgao" id="id_orgao" value="<?php echo $res[0][8]; ?>" />
            <input type="hidden" name="id_unidade" id="id_unidade" value="<?php echo $res[0][7]; ?>" />
			<div class="form-horizontal">
            	<div id="div_nome" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Nome</label>
					<div class="controls">
                    <input type="text" name="no_responsavel" id="no_responsavel" style="width:550px;" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </div>
                </div>
                <div id="div_sigla" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Telefone</label>
					<div class="controls">
                    <input type="text" name="nu_telefone" id="nu_telefone" maxlength="30" value="<?php echo $res[0][2]; ?>"  />
                    </div>
                </div>
                <div id="div_endereco" class="control-group">
                    <label style="font-weight:bold;" class="control-label">E-mail</label>
					<div class="controls">
                    <input type="text" name="no_email" id="no_email" maxlength="100" style="width:550px;" value="<?php echo $res[0][3]; ?>" />
                    </div>
                </div>
                 <div id="div_status" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Status</label>
					<div class="controls">
                    <input type="radio" name="status" id="ativo" value="1" style="margin-top:1px;" <?php if ($res[0][4] == 1) {echo "checked='checked'"; } ?> /><span> Ativo </span>
                    <input type="radio" name="status" id="inativo" value="0" style="margin-top:1px;" <?php if ($res[0][4] == 0) {echo "checked='checked'";} ?> /><span> Inativo </span>
					</div>
				</div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Salvar" name="salvar_responsavel" id="salvar_responsavel" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
				</div>
            </div>
         </form>
    </div>
    </div>
</body>
</html>