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
<script src="js/valida-orgao.js"></script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM orgao WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="centro_editar">
        <div class="navbar" style="margin-top:20px;">
            <div class="navbar-inner">
                <h3 class="title_cadastro_portais">Editar Órgão</h3>
            </div>
        </div>
    </div>
    <div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
			<div class="form-horizontal">
        	<input type="hidden" name="id_orgao" id="id_orgao" value="<?php echo $ID; ?>" />
            	<div id="div_nome" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Nome</label>
					<div class="controls">
                    <input type="text" name="no_orgao" id="no_orgao" style="width:550px;" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </div>
                </div>
                <div id="div_sigla" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Sigla</label>
					<div class="controls">
                    <input type="text" name="no_sigla" id="no_sigla" maxlength="30" value="<?php echo $res[0][2]; ?>" required />
                    </div>
                </div>
                <div id="div_tipo" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Tipo</label>
					<div class="controls">
                    <input type="radio" name="tipo" id="tp_direta" value="0" style="margin-top:1px;" <?php if ($res[0][3]==0) echo "checked='checked'"; ?> /><span> Administração Direta </span>
                    <input type="radio" name="tipo" id="tp_indireta" value="1" style="margin-top:1px;" <?php if ($res[0][3]==1) echo "checked='checked'"; ?> /> <span> Administração Indireta </span>
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
                    <input type="submit" value="Salvar" name="salvar_orgao" id="salvar_orgao" class="btn btn-primary" />
                    <a style="margin-left: 10px;" href=""><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
					</div>
				</div>
            </div>
         </form>
    </div>
    </div>
</body>
</html>