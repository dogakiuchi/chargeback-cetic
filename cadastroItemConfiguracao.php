<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-itemdeconfiguracao.js"></script>
</head>
<body>
	<div id="formularioModal">
	<div class="navbar">
    	<div class="navbar-inner">
        	<h4>Cadastro de Item de Configuração</h4>
        </div>
    </div>
        <form name="form" method="post" action="" onsubmit="return false;">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
		    <div class="form-horizontal">
            	<div id="div_nome" class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
						<input type="text" name="no_item" id="no_item"  class="input-xxlarge" maxlength="100" required />
						</div>
                </div>
                <div id="div_descricao" class="control-group">
                        <label class="control-label">Descrição</label>
						<div class="controls">
                        <textarea name="ds_descricao" id="ds_descricao" rows="4" cols="100" class="input-xxlarge"></textarea>
						</div>
                </div>
                <div id="div_categoria" class="control-group">
                         <label class="control-label">Categoria</label>				
                         <div class="controls">
                            <select tabindex="2" name="no_categoria" id="no_categoria">
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
                        <label class="control-label">Configuração</label>
						<div class="controls">
                        <input type="text" name="ds_configuracao" id="ds_configuracao" class="input-large" maxlength="100"/>
						</div>
                </div>
				<div id="div_endereco" class="control-group">
                        <label class="control-label">Custo Mensal</label>
						<div class="controls">
                        <input type="text" name="nu_custo_mensal" id="nu_custo_mensal" class="input-large" maxlength="15"/>
						</div>
                </div>
                <div id="div_status" class="control-group">
                    	 <label class="control-label"> Status</label>
						 <div class="controls">
                         <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" checked="checked" />Ativo</label>
                         <label class="radio inline"><input type="radio" name="status" id="inativo" value="0"/>Inativo</label>
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
 </body>
 </html>	 
    	
  
        