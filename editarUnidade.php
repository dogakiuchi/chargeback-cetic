<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-unidade.js"></script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM unidade WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="formularioModal">
        <div class="navbar">
            <div class="navbar-inner">
                <h4>Editar Unidade</h4>
            </div>
        </div>
        <form name="form" method="post" action="" onsubmit="return false;">
            <input type="hidden" name="id_unidade" id="id_unidade" value="<?php echo $ID; ?>" />
			<div class="form-horizontal">
                <div id="div_orgao" class="control-group">
                         <label class="control-label">Órgão</label>				
                         <div class="controls">
                            <select  name="no_orgao" id="no_orgao" class="input-xxlarge">
								<option value="-"></option>
                                <?php
								    $sql1 = "SELECT id, no_orgao FROM orgao ORDER BY no_orgao";
				                    $res1 = f_leitura($db,$sql1);
                                    if ($res1 == true){
                                        
                                        foreach ($res1 as $l) {
                                            if ($res[0][8] == $l[0]){
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
            	<div id="div_nome" class="control-group">
                    <label class="control-label">Nome</label>
					<div class="controls">
                    <input type="text" name="no_unidade" id="no_unidade" class="input-xxlarge" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </div>
                </div>
                <div id="div_sigla" class="control-group">
                    <label class="control-label">Sigla</label>
					<div class="controls">
                    <input type="text" name="no_sigla" id="no_sigla" class="input-medium" maxlength="15" value="<?php echo $res[0][2]; ?>"  />
                    </div>
                </div>
                <div id="div_endereco" class="control-group">
                    <label class="control-label">Endereço</label>
					<div class="controls">
                    <input type="text" name="no_endereco" id="no_endereco" class="input-xxlarge" maxlength="100" class="input-xxlarge" value="<?php echo $res[0][3]; ?>" />
                    </div>
                </div>
                <div id="div_cep" class="control-group">
                    <label class="control-label">CEP</label>
					<div class="controls">
                    <input type="text" name="nu_cep" id="nu_cep" class="input-medium" maxlength="20"  value="<?php echo $res[0][4]; ?>" />
                    </div>
                </div>
                <div id="div_cidade" class="control-group">
                         <label class="control-label">Cidade</label>				
                         <div class="controls">
                            <select  name="no_cidade" id="no_cidade">
                                <?php
								    $sql2 = "SELECT id, no_cidade FROM cidade ORDER BY no_cidade";
				                    $result = f_leitura($db,$sql2);
                                    if ($result == true){
                                        
                                        foreach ($result as $linha) {
                                            if ($res[0][9] == $linha[0]){
                                                echo "<option value='".$linha[0]."' selected> ".$linha[1]." </option>";
                                            }else{
                                                echo "<option value='".$linha[0]."'> ".$linha[1]." </option>";
                                            }  
                                        }
                                    }
								?>
                            </select>
						</div>
				</div>
                 <div id="div_status" class="control-group">
                    <label class="control-label">Status</label>
					<div class="controls">
                    <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" <?php if ($res[0][5] == 1) {echo "checked='checked'"; } ?> />Ativo</label>
                    <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" <?php if ($res[0][5] == 0) {echo "checked='checked'";} ?> />Inativo</label>
					</div>
				</div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Salvar" name="salvar_unidade" id="salvar_unidade" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
				</div>
            </div>
         </form>
    </div>
    </div>
</body>
</html>