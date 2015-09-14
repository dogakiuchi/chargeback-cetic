<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/select-unidade.js"></script>
<script src="js/select-itemdeconfiguracao.js"></script>
<script src="js/adiciona-campo-itemdeconfiguracao.js"></script>
<script src="js/valida-chargeback.js"></script>
</head>
<body>
    <div class="formularioModal">
    <div class="navbar">
        <div class="navbar-inner">
            <h4>Cadastro Chargeback</h4>
        </div>
    </div>
	<div>
        <form name="form" method="post" id="charge" action="" onsubmit="return false;" class="form-horizontal">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
                <div id="div_orgao" class="control-group">
                         <label class="control-label">Órgão</label>
                            <div class="controls">
                            <select name="no_orgao" id="no_orgao" class="meuSelect">
								<option value="">SELECIONE UM ÓRGÃO</option>
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
                         <label class="control-label">Unidade</label>	
                            <div class="controls">
                                <select  name="no_unidade" id="no_unidade" class="meuSelect">
								    <option value="-">SELECIONE A UNIDADE</option>
                                </select>
                            </div>
                </div>
                <div id="div_categoria" class="control-group">
                         <label class="control-label">Categoria</label>
                            <div class="controls">
                                <select name="no_categoria" id="no_categoria" class="meuSelect">
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
				</div>
                
                <div class="control-group">
                        <label class="control-label">Item / Quantidade</label>
            	           <ul class="form_material controls">
            		          <li >
            		              <select  name="materiais[]" id="materiais" class="meuSelect">
            			             <option value="-" selected>SELECIONE UM ITEM E INFORME A QUANTIDADE</option>
            		              </select><input type="text" class="qtd1 maskNum" name="quantidades[]" maxlength="4" style="width:25px;">&nbsp;<i class="icon-plus" id="mais_material"></i>
            		          </li>
            	           </ul>
                            
                </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" class="hiddenidcategoria" value=""/>
                            <input type="submit" value="Cadastrar" name="salvar_chargeback" id="salvar_chargeback" class="btn btn-primary" />
                            <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
                        </div>
                    </div>
         </form>
    </div>
</div>
 </body>
 </html>	 
    	
  
        