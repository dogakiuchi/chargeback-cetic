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
<script src="js/valida-itemdeconfiguracao.js"></script>
</head>
<body>
	<div id="centro_editar">
	<div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
        	<h4 class="title_cadastro_portais">Cadastro de Item de Configuração</h4>
        </div>
    </div>
	<div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
		    <div class="form-horizontal">
            	<div id="div_nome" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Item</label>
                        <div class="controls">
						<input type="text" name="no_item" id="no_item"  style="width:550px;" maxlength="100" required />
						</div>
                </div>
                <div id="div_descricao" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Descrição</label>
						<div class="controls">
                        <textarea name="ds_descricao" id="ds_descricao" rows="4" cols="100" style="width:550px;"></textarea>
						</div>
                </div>
                <div id="div_categoria" class="control-group">
                         <label style="font-weight:bold;" class="control-label">Categoria</label>				
                         <div class="controls">
                            <select data-placeholder="SELECIONE A CATEGORIA" class="chosen-select" style="width:550px;" tabindex="2" name="no_categoria" id="no_categoria">
								<option value="-"></option>
                                <?php
								    require("banco/conecta.php");
								    $sql = "SELECT id, no_categoriaitem FROM categoriaitem ORDER BY no_categoriaitem";
				                    $result = f_leitura($db,$sql);
                                    if ($result == true){
                                        
                                        foreach ($result as $linha) {
                                            echo "<option value='".$linha[0]."' > ".$linha[1]." </option>";
                                            
                                        }
                                    }
								?>
                            </select>
						</div>
				</div>
                <div id="div_configuracao" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Configuração</label>
						<div class="controls">
                        <input type="text" name="ds_configuracao" id="ds_configuracao" maxlength="100" style="width:550px;"/>
						</div>
                </div>
				<div id="div_endereco" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Custo Mensal</label>
						<div class="controls">
                        <input type="text" name="nu_custo_mensal" id="nu_custo_mensal" maxlength="15"/>
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
                    <input type="submit" value="Cadastrar" name="salvar_itemdeconfiguracao" id="salvar_itemdeconfiguracao" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
                </div>
            </div>
         </form>
    </div>
    </div>
 </body>
 </html>	 
    	
  
        