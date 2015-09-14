<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-itemdeconfiguracao.js"></script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM itemdeconfiguracao WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="formularioModal">
        <div class="navbar">
            <div class="navbar-inner">
                <h4>Editar Item de Configuração</h4>
            </div>
        </div>
    </div>
        <form name="form" method="post" action="" onsubmit="return false;">
            <input type="hidden" name="id_item" id="id_item" value="<?php echo $ID; ?>" />
			<div class="form-horizontal">
            	<div id="div_nome" class="control-group">
                    <label class="control-label">Item</label>
					<div class="controls">
                    <input type="text" name="no_item" id="no_item" class="input-xxlarge" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </div>
                </div>
                <div id="div_descricao" class="control-group">
                    <label class="control-label">Descrição</label>
					<div class="controls">
                    <textarea name="ds_descricao" id="ds_descricao" class="input-xxlarge" rows="4" cols="100"><?php echo $res[0][2]; ?></textarea>
                    </div>
                </div>
                <div id="div_categoria" class="control-group">
                         <label class="control-label">Categoria</label>				
                         <div class="controls">
                            <select  name="no_categoria" id="no_categoria">
								<option value="-"></option>
                                <?php
								    $sql1 = "SELECT id, no_categoriaitem FROM categoriaitem ORDER BY no_categoriaitem";
				                    $res1 = f_leitura($db,$sql1);
                                    if ($res1 == true){
                                        foreach ($res1 as $l) {
                                            if ($res[0][6] == $l[0]){
                                                echo "<option value='".$l[0]."' selected> ".$l[1]." </option>";
                                            }else{
                                                echo "<option value='".$l[0]."'> ".$l[1]." </option>";
                                            }  
                                        }
                                    }
								?>
                            </select>
						</div>
				</div>
                <div id="div_configuracao" class="control-group">
                    <label  class="control-label">Configuração</label>
					<div class="controls">
                    <input type="text" name="ds_configuracao" id="ds_configuracao" maxlength="100" value="<?php echo $res[0][7]; ?>" />
                    </div>
                </div>
                <div id="div_custo" class="control-group">
                    <label class="control-label">Custo Mensal</label>
					<div class="controls">
                    <input type="text" name="nu_custo_mensal" id="nu_custo_mensal" maxlength="100" value="<?php echo $res[0][3]; ?>" />
                    </div>
                </div>
                 <div id="div_status" class="control-group">
                    <label class="control-label">Status</label>
					<div class="controls">
                    <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" <?php if ($res[0][8] == 1) {echo "checked='checked'"; } ?> />Ativo</label>
                    <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" <?php if ($res[0][8] == 0) {echo "checked='checked'";} ?> />Inativo</label>
					</div>
				</div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Salvar" name="salvar_itemdeconfiguracao" id="salvar_itemdeconfiguracao" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
				</div>
            </div>
         </form>
    </div>
</body>
</html>