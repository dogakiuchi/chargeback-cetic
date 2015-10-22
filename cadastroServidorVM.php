<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/select-unidade.js"></script>
<script src="js/valida-servidorvm.js"></script>
</head>
<body>
    <div class="formularioModal">
      <div class="row-fluid">
        <form name="form" method="post" id="charge" action="" onsubmit="return false;" class="form-horizontal">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
            <div class="span12">
                <div id="div_orgao" class="control-group">
                         <label class="control-label">Órgão</label>
                            <div class="controls">
                            <select name="no_orgao" id="no_orgao" class="input-xxlarge">
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
                </div>
                <div id="div_unidade" class="control-group">
                         <label class="control-label">Unidade</label>	
                            <div class="controls">
                                <select  name="no_unidade" id="no_unidade" class="input-xxlarge">
								    <option value="-">SELECIONE A UNIDADE</option>
                                </select>
                            </div>
                </div>
                    <div class="row-fluid">
                    <div class="span5">
                      <div id="div_categoria" class="control-group">
                         <label class="control-label">Cloud Server</label>
                            <div class="controls">
                                <select name="no_item" id="no_item" class="input-medium">
								<option value="-"></option>
                                <?php
								    $sql1 = "SELECT id, no_item FROM itemdeconfiguracao WHERE categoriaitem_id = 1 ORDER BY no_item";
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
                   <div id="div_servidor" class="control-group">
                        <label  class="control-label">Nome</label>
						<div class="controls">
                        <input type="text" name="no_servidor" id="no_servidor" class="input-medium" maxlength="30" />
						</div>
                    </div>
                    <div id="div_ip" class="control-group">
                        <label  class="control-label">Endereço IP</label>
						<div class="controls">
                        <input type="text" name="nu_ip" id="nu_ip" class="input-medium" maxlength="15" />
						</div>
                      </div>
                     <div id="div_dns" class="control-group">
                        <label  class="control-label">DNS</label>
						<div class="controls">
                        <input type="text" name="no_dns" id="no_dns" class="input-medium" maxlength="15" />
						</div>
                      </div>
                        </div><!--Fecha span 5-->
                   <div class="span7">
                   <div id="div_categoria" class="control-group">
                         <label class="control-label">Sistema Operacional</label>
                            <div class="controls">
                                <select name="no_item" id="no_item" class="input-medium">
								<option value="-"></option>
                                <?php
								    $sql2 = "SELECT id, no_item FROM itemdeconfiguracao WHERE categoriaitem_id = 2 ORDER BY no_item";
				                    $result2 = f_leitura($db,$sql2);
                                    if ($result2 == true){
                                        
                                        foreach ($result2 as $linha2) {
                                            echo "<option value='".$linha2[0]."' > ".$linha2[1]." </option>";
                                        }
                                    }
								?>
                                </select>
                            </div>
				      </div>
                    <div id="div_espaco" class="control-group">
                        <label  class="control-label">Espaço Provisionado</label>
						<div class="controls">
                            <input type="number" name="nu_espaco" id="nu_espaco" class="input-mini"  value="0"/>
						</div>
                      </div>
                      <div id="div_memoria" class="control-group">
                        <label  class="control-label">Memória</label>
						<div class="controls">
                            <input type="number" name="nu_memoria" id="nu_memoria" class="input-mini" value="0"/>
						</div>
                      </div>
                     <div id="div_cpu" class="control-group">
                        <label  class="control-label">CPU Count</label>
						<div class="controls">
                        <input type="number" name="nu_cpu" id="nu_cpu" class="input-mini" maxlength="15" value="0"/>
						</div>
                     </div>
                        </div><!--Fecha span 7-->
                </div><!--Fecha row fluid-->
                    <div id="div_status" class="control-group">
                    	 <label class="control-label"> Status</label>
						 <div class="controls">
                         <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" checked="checked" />Ativo</label>
                         <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" />Inativo</label>
						 </div>
                   </div>
                      <div id="div_obs" class="control-group">
                        <label class="control-label">Observação</label>
						<div class="controls">
                        <textarea name="ds_observacao" id="ds_observacao" class="input-xxlarge" rows="1" cols="80"></textarea>
						</div>
                      </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" class="hiddenidcategoria" value="4"/>
                            <input type="submit" value="Cadastrar" name="salvar_servidorvm" id="salvar_servidorvm" class="btn btn-primary" />
                            <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
                        </div>
                    </div>
         </form>
        </div>
</div>
</body>
</html>	