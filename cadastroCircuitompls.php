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
    <div class="navbar">
        <div class="navbar-inner">
            <h4>Cadastro Circuito MPLS</h4>
        </div>
    </div>
	<div>
        <form name="form" method="post" id="charge" action="" onsubmit="return false;" class="form-horizontal">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
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
                <div id="div_categoria" class="control-group">
                         <label class="control-label">Item</label>
                            <div class="controls">
                                <select name="no_item" id="no_item" class="input-large">
								<option value="-">SELECIONE UM ITEM</option>
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
                            <input type="number" name="nu_lote" id="nu_lote" min="1" max="5"/>
						</div>
                </div>
                <div id="div_iplan" class="control-group">
                        <label  class="control-label">IP LAN</label>
						<div class="controls">
                        <input type="text" name="nu_iplan" id="nu_iplan" maxlength="15" />
						</div>
                </div>
                <div id="div_mascara" class="control-group">
                        <label  class="control-label">Máscara</label>
						<div class="controls">
                        <input type="text" name="nu_mascara" id="nu_mascara" maxlength="15" />
						</div>
                </div>
                <div id="div_ipwan" class="control-group">
                        <label  class="control-label">IP WAN</label>
						<div class="controls">
                        <input type="text" name="nu_ipwan" id="nu_ipwan" maxlength="15" />
						</div>
                </div>
                <div id="div_designacao" class="control-group">
                        <label  class="control-label">Designação</label>
						<div class="controls">
                        <input type="text" name="no_designacao" id="no_designacao" maxlength="30" />
						</div>
                </div>
                
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" class="hiddenidcategoria" value="4"/>
                            <input type="submit" value="Cadastrar" name="salvar_circuitompls" id="salvar_circuitompls" class="btn btn-primary" />
                            <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
                        </div>
                    </div>
         </form>
    </div>
</div>
</body>
</html>	