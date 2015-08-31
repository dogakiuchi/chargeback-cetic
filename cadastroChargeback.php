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
<script src="js/jquery.livequery.js"></script>
<script src="js/select-unidade.js"></script>
<script src="js/adiciona-campo-itemdeconfiguracao.js"></script>
<script src="js/valida-chargeback.js"></script>
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
                <div id="div_categoria" class="control-group">
                         <label style="font-weight:bold;" class="control-label">Categoria</label>				
                         <div class="controls">
                            <select data-placeholder="SELECIONE UMA CATEGORIA" class="chosen-select" style="width:300px;" tabindex="2" name="no_categoria" id="no_categoria">
								<option value="-"></option>
                                <?php
								    $sql1 = "SELECT id, no_categoriaitem FROM categoriaitem ORDER BY no_categoriaitem";
				                    $result1 = f_leitura($db,$sql1);
                                    if ($result1 == true){
                                        
                                        foreach ($result1 as $linha1) {
                                            echo "<option value='".$linha1[0]."' > ".$linha1[1]." </option>";
                                        }
                                    }
								?>
                            </select>
						</div>
				</div>
             </div>
                <div id="form_material" class="control-group">
                        <label style="font-weight:bold;" class="control-label">Item / Quantidade</label>
            	           <ul class="form_material" style="list-style-type:none;">
            		          <li >
            		              <select data-placeholder="SELECIONE UMA CATEGORIA"  name="materiais[]" style="width: 400px;" class="chosen-select">
            			             <option value="-" selected></option>
            			                 <?php 
            				                $sql_materiais = "SELECT id, no_item
											                 FROM itemdeconfiguracao
											                 ORDER BY no_item";
            				                $res_materiais = mysql_query($sql_materiais);
            				                while ($row_materiais = mysql_fetch_array($res_materiais)){
								            echo "<option value='".$row_materiais['id']."'>".$row_materiais['no_item']."</option>";
							                 }	
            			                 ?>
            		              </select>
            		              <input type="text" class="qtd1 maskNum" name="quantidades[]" maxlength="4" style="width:50px;">
            		          </li>
            	           </ul>
                         <div id="mais_material">Adicionar campo +</div>
                </div>
                        
    		   
        
    
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Cadastrar" name="salvar_chargeback" id="salvar_chargeback" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
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
    	
  
        