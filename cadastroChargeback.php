<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CeTIC</title>
<link  type="text/css"rel="stylesheet" href="css/estilo.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/chosen.css" rel="stylesheet" media="screen">
<link href="css/jquery.toastmessage-min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.toastmessage.js"></script>
<script src="js/chosen.jquery.js"></script>  
<script src="js/valida-chargeback.js"></script>
<script src="js/select-unidade.js"></script>
</head>
<body>
	<div id="centro_editar">
	<div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
        	<h4 class="title_cadastro_portais">Cadastro Chargeback</h4>
        </div>
    </div>
	<div id="form_cadastro">
        <form name="form" method="post" action="" onsubmit="return false;">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
		    <div class="form-horizontal">
                <div id="div_orgao" class="control-group">
                         <label style="font-weight:bold;" class="control-label">Órgão</label>				
                         <div class="controls">
                            <select data-placeholder="SELECIONE O ÓRGÃO" class="chosen-select" style="width:550px;" tabindex="2" name="no_orgao" id="no_orgao">
								<option value="-"></option>
                                <?php
								    require("banco/conecta.php");
								    $sql = "SELECT id, no_orgao FROM orgao ORDER BY no_orgao";
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
                <div id="div_unidade" class="control-group">
                         <label style="font-weight:bold;" class="control-label">Unidade</label>				
                         <div class="controls">
                            <select data-placeholder="SELECIONE A UNIDADE" class="chosen-select" style="width:550px;" tabindex="2" name="no_unidade" id="no_unidade">
								<option value="-"></option>
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
                        <label style="font-weight:bold;" class="control-label">Quantidade</label>
						<div class="controls">
                        <input type="text" name="nu_custo_mensal" id="nu_custo_mensal" maxlength="15"/>
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

<script type="text/javascript">

   $(".chosen-select").chosen();

</script>
 </body>
 </html>	 
    	
  
        