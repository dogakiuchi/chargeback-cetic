<!DOCTYPE html>
<html>
<head lang="pt-br">
<meta charset="utf-8" />
<title>GoTIC</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.toastmessage-min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/jquery.toastmessage.js"></script>
<script src="js/valida-unidade.js"></script>
</head>
<body>
	<?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT * FROM unidade WHERE id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
	<div id="centro_editar">
        <div class="navbar" style="margin-top:20px;">
            <div class="navbar-inner">
                <h3 class="title_cadastro_portais">Editar Unidade</h3>
            </div>
        </div>
    </div>
    <div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
            <input type="hidden" name="id_unidade" id="id_unidade" value="<?php echo $ID; ?>" />
			<div class="form-horizontal">
                <div id="div_orgao" class="control-group">
                         <label style="font-weight:bold;" class="control-label">Órgão</label>				
                         <div class="controls">
                            <select  name="no_orgao" id="no_orgao" style="width:550px;">
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
                    <label style="font-weight:bold;" class="control-label">Nome</label>
					<div class="controls">
                    <input type="text" name="no_unidade" id="no_unidade" style="width:550px;" maxlength="100" value="<?php echo $res[0][1]; ?>" required />
                    </div>
                </div>
                <div id="div_sigla" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Sigla</label>
					<div class="controls">
                    <input type="text" name="no_sigla" id="no_sigla" maxlength="30" value="<?php echo $res[0][2]; ?>"  />
                    </div>
                </div>
                <div id="div_endereco" class="control-group">
                    <label style="font-weight:bold;" class="control-label">Endereço</label>
					<div class="controls">
                    <input type="text" name="no_endereco" id="no_endereco" maxlength="100" style="width:550px;" value="<?php echo $res[0][3]; ?>" />
                    </div>
                </div>
                <div id="div_cep" class="control-group">
                    <label style="font-weight:bold;" class="control-label">CEP</label>
					<div class="controls">
                    <input type="text" name="nu_cep" id="nu_cep" maxlength="20"  value="<?php echo $res[0][4]; ?>" />
                    </div>
                </div>
                <div id="div_cidade" class="control-group">
                         <label style="font-weight:bold;" class="control-label">Cidade</label>				
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
                    <label style="font-weight:bold;" class="control-label">Status</label>
					<div class="controls">
                    <input type="radio" name="status" id="ativo" value="1" style="margin-top:1px;" <?php if ($res[0][5] == 1) {echo "checked='checked'"; } ?> /><span> Ativo </span>
                    <input type="radio" name="status" id="inativo" value="0" style="margin-top:1px;" <?php if ($res[0][5] == 0) {echo "checked='checked'";} ?> /><span> Inativo </span>
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