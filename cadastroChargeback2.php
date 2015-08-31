<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CeTIC</title>
<script src="js/jquery.js"></script>
<script src="js/select-unidade.js"></script>
<script src="js/select-itemdeconfiguracao.js"></script>
<script src="js/adiciona-campo-itemdeconfiguracao.js"></script>
<script src="js/valida-chargeback.js"></script>
</head>
<body>
    <h4 >Cadastro Chargeback</h4>
	<div>
        <form name="form" method="post" action="" onsubmit="return false;">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
                <div id="div_orgao">
                         <label style="font-weight:bold;">Órgão</label>				
                            <select name="no_orgao" id="no_orgao">
								<option value="-">SELECIONE UM ÓRGÃO</option>
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
                <div id="div_unidade">
                         <label style="font-weight:bold;">Unidade</label>				
                            <select  name="no_unidade" id="no_unidade">
								<option value="-">SELECIONE A UNIDADE</option>
                            </select>
                </div>
                <div id="div_categoria">
                         <label style="font-weight:bold;">Categoria</label>				
                            <select name="no_categoria" id="no_categoria">
								<option value="-">SELECIONE UMA CATEGORIA</option>
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
                <div id="form_material">
                        <label style="font-weight:bold;">Item / Quantidade</label>
            	           <ul class="form_material" style="list-style-type:none;">
            		          <li >
            		              <select  name="materiais[]" style="width: 400px;">
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
            		              </select><input type="text" class="qtd1 maskNum" name="quantidades[]" maxlength="4" style="width:50px;">
            		          </li>
            	           </ul>
                         <div id="mais_material">Adicionar campo +</div>
                </div>  
                <div>
                    <input type="submit" value="Cadastrar" name="salvar_chargeback" id="salvar_chargeback" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
                </div>

         </form>
    </div>
 </body>
 </html>	 
    	
  
        