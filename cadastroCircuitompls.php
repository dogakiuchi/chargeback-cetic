<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/select-unidade.js"></script>
<script src="js/select-responsavel.js"></script>
<script src="js/valida-circuitompls.js"></script>
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
                <div id="div_unidade" class="control-group">
                         <label class="control-label">Responsável</label>	
                            <div class="controls">
                                <select  name="no_responsavel" id="no_responsavel" class="input-xxlarge">
								    <option value="-">SELECIONE UM RESPONSÁVEL</option>
                                </select>
                            </div>
                    </div>                      
                <div class="row-fluid">
                    <div class="span5">
                      <div id="div_categoria" class="control-group">
                         <label class="control-label">Item</label>
                            <div class="controls">
                                <select name="no_item" id="no_item" class="input-medium">
								<option value="-">CIRCUITO</option>
                                <?php
								    $sql1 = "SELECT id, no_item FROM itemdeconfiguracao WHERE categoriaitem_id = 4 AND no_item LIKE '%MPLS%' ORDER BY no_item";
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
                      <div id="div_lote" class="control-group">
                        <label  class="control-label">Lote</label>
						<div class="controls">
                            <input type="number" name="nu_lote" id="nu_lote" class="input-mini" min="0" max="5" value="0"/>
						</div>
                      </div>
                     <div id="div_usuarios" class="control-group">
                        <label  class="control-label">Usuários</label>
						<div class="controls">
                        <input type="number" name="nu_usuarios" id="nu_usuarios" class="input-mini" maxlength="15" value="0"/>
						</div>
                      </div>
                      <div id="div_instalacao" class="control-group">
                        <label  class="control-label">Instalação</label>
						<div class="controls">
                        <input type="text" name="dt_instalacao" id="dt_instalacao" class="data_ui input-small" maxlength="30" />
						</div>
                      </div>
                      <div id="div_homologacao" class="control-group">
                        <label  class="control-label">Homologação</label>
						<div class="controls">
                        <input type="text" name="dt_homologacao" id="dt_homologacao" class="data_ui input-small" maxlength="30" />
						</div>
                      </div>
                    <div id="div_designacao" class="control-group">
                        <label  class="control-label">Designação</label>
						<div class="controls">
                        <input type="text" name="no_designacao" id="no_designacao" class="input-medium" maxlength="30" />
						</div>
                    </div>
                    </div><!--Fim Span 5-->
                    <div class="span7">
                         <div id="div_iplan" class="control-group">
                        <label  class="control-label">IP LAN</label>
						<div class="controls">
                        <input type="text" name="nu_iplan" id="nu_iplan" class="input-medium" maxlength="15" />
						</div>
                      </div>
                      <div id="div_mascara" class="control-group">
                        <label  class="control-label">Máscara</label>
						<div class="controls">
                        <input type="text" name="nu_mascara" id="nu_mascara" class="input-medium" maxlength="15" />
						</div>
                      </div>
                      <div id="div_ipwan" class="control-group">
                        <label  class="control-label">WAN Cliente</label>
						<div class="controls">
                        <input type="text" name="wan_cliente" id="wan_cliente" class="input-medium" maxlength="15" />
						</div>
                      </div>
                    <div id="div_wan" class="control-group">
                        <label  class="control-label">WAN Operadora</label>
						<div class="controls">
                        <input type="text" name="wan_operadora" id="wan_operadora" class="input-medium" maxlength="15" />
						</div>
                      </div>
                    <div id="div_faixa" class="control-group">
                        <label  class="control-label">Faixa DHCP</label>
						<div class="controls">
                        <input type="text" name="ds_faixa" id="ds_faixa" class="input-large" maxlength="45" />
						</div>
                      </div>
                    <div id="div_status" class="control-group">
                    	 <label class="control-label"> Status</label>
						 <div class="controls">
                         <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" checked="checked" />Ativo</label>
                         <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" />Inativo</label>
						 </div>
                   </div>
                    </div><!--Fim Span 7-->
                    <div class="row-fluid"></div>
                    <div class="span12">
                      <div id="div_obs" class="control-group">
                        <label class="control-label">Observação</label>
						<div class="controls">
                        <textarea name="ds_observacao" id="ds_observacao" class="input-xxlarge" rows="1" cols="80"></textarea>
						</div>
                      </div>
                    </div>
                    </div
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" class="hiddenidcategoria" value="4"/>
                            <input type="submit" value="Cadastrar" name="salvar_circuitompls" id="salvar_circuitompls" class="btn btn-primary" />
                            <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
                        </div>
                    </div>
                    </div>
                </div><!--Fim Span 12-->
         </form>
        </div>
</div>
</body>
</html>	