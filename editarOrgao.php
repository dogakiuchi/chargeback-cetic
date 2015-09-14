<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-orgao.js"></script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM orgao WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="formularioModal">
        <div class="navbar">
            <div class="navbar-inner">
                <h4>Editar Órgão</h4>
            </div>
        </div>
    </div>
    <div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
			<div class="form-horizontal">
        	<input type="hidden" name="id_orgao" id="id_orgao" value="<?php echo $ID; ?>" />
            	<div id="div_nome" class="control-group">
                    <label class="control-label">Nome</label>
					<div class="controls">
                    <input type="text" name="no_orgao" id="no_orgao" class="input-xxlarge" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </div>
                </div>
                <div id="div_sigla" class="control-group">
                    <label  class="control-label">Sigla</label>
					<div class="controls">
                    <input type="text" name="no_sigla" id="no_sigla" class="input-medium" maxlength="15" value="<?php echo $res[0][2]; ?>" required />
                    </div>
                </div>
                <div id="div_tipo" class="control-group">
                    <label  class="control-label">Tipo</label>
					<div class="controls">
                        <label class="radio inline"><input type="radio" name="tipo" id="tp_direta" value="0"  <?php if ($res[0][3]==0) echo "checked='checked'"; ?> />Administração Direta</label>
                        <label class="radio inline"><input type="radio" name="tipo" id="tp_indireta" value="1" <?php if ($res[0][3]==1) echo "checked='checked'"; ?> />Administração Indireta</label>
					</div>
				</div>
                 <div id="div_status" class="control-group">
                    <label class="control-label">Status</label>
					<div class="controls">
                        <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" <?php if ($res[0][4] == 1) {echo "checked='checked'"; } ?> />Ativo</label>
                        <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" <?php if ($res[0][4] == 0) {echo "checked='checked'";} ?> />Inativo</label>
					</div>
				</div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Salvar" name="salvar_orgao" id="salvar_orgao" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
				</div>
            </div>
         </form>
    </div>
    </div>
</body>
</html>