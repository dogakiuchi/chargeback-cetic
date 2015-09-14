<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-responsavel.js"></script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM responsavel WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="formularioModal">
        <div class="navbar">
            <div class="navbar-inner">
                <h4>Editar Responsável</h4>
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
                    <label  class="control-label">Nome</label>
					<div class="controls">
                    <input type="text" name="no_responsavel" id="no_responsavel" class="input-xxlarge" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </div>
                </div>
                <div id="div_sigla" class="control-group">
                    <label  class="control-label">Telefone</label>
					<div class="controls">
                    <input type="text" name="nu_telefone" id="nu_telefone" class="input-medium" maxlength="15" value="<?php echo $res[0][2]; ?>"  />
                    </div>
                </div>
                <div id="div_celular" class="control-group">
                        <label  class="control-label">Celular</label>
						<div class="controls">
                        <input type="text" name="nu_celular" id="nu_celular" class="input-medium" maxlength="15" value="<?php echo $res[0][9]; ?>"/>
						</div>
                </div>
                <div id="div_endereco" class="control-group">
                    <label class="control-label">E-mail</label>
					<div class="controls">
                        <div class="input-prepend">
                          <span class="add-on"><i class="icon-envelope"></i></span>
                          <input type="text" name="no_email" id="no_email" class="input-xlarge" maxlength="100" value="<?php echo $res[0][3]; ?>" />
                        </div>
                    </div>
                </div>
                 <div id="div_status" class="control-group">
                    <label class="control-label">Status</label>
					<div class="controls">
                    <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" <?php if ($res[0][4] == 1) {echo "checked='checked'"; } ?> />Ativo</label>
                    <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" <?php if ($res[0][4] == 0) {echo "checked='checked'";} ?> />Inativo</label>
					</div>
				</div>
                <div id="div_obs" class="control-group">
                        <label class="control-label">Observação</label>
						<div class="controls">
                        <textarea name="ds_observacao" id="ds_observacao" class="input-xxlarge" rows="2" cols="100"><?php echo $res[0][10]; ?></textarea>
						</div>
                </div
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