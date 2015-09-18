<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-circuitompls.js"></script>
</head>
<body>
    <?php 
		require("banco/conecta.php");
		$ID = $_GET['id'];
		$sql = "SELECT c.*, o.no_orgao, u.no_unidade, i.no_item FROM circuitompls AS c
                INNER JOIN orgao AS o ON c.orgao_id = o.id
                INNER JOIN unidade AS u ON c.unidade_id = u.id
                INNER JOIN itemdeconfiguracao AS i ON c.itemdeconfiguracao_id = i.id
                WHERE c.id = ".$ID;
		$res = f_leitura($db, $sql);
	?>
    <div class="formularioModal">
      <div class="row-fluid">
        <form name="form" method="post" action="" onsubmit="return false;" class="form-horizontal">
            <div class="span12">
                <div id="div_orgao" class="control-group">
                         <label class="control-label">Órgão</label>
                            <div class="controls">
                              <input type="text" name="no_orgao" id="no_orgao" class="input-xxlarge" value="<?php echo $res[0][20]; ?>" disabled/>
                            </div>
                </div>
                <div id="div_unidade" class="control-group">
                         <label class="control-label">Unidade</label>	
                            <div class="controls">
                            <input type="text" name="no_unidade" id="no_unidade" class="input-xxlarge" value="<?php echo $res[0][21]; ?>" disabled/>
                            </div>
                </div>
                <div class="row-fluid">
                <div class="span5">
                    <div id="div_unidade" class="control-group">
                         <label class="control-label">Responsável</label>	
                            <div class="controls">
                                <select  name="no_responsavel" id="no_responsavel" class="input-large">
								    <option value="-">SELECIONE UM RESPONSÁVEL</option>
                                <?php
								    $sql2 = "SELECT id, no_responsavel FROM responsavel WHERE unidade_id =".$res[0][9];
				                    $result2 = f_leitura($db,$sql2);
                                    if ($result2 == true){
                                        foreach ($result2 as $k) {
                                            if ($res[0][8] == $k[0]){
                                                echo "<option value='".$k[0]."' selected> ".$k[1]." </option>";
                                            }else{
                                                echo "<option value='".$k[0]."'> ".$k[1]." </option>";
                                            }  
                                        }
                                    }
								?>
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
                                        foreach ($result1 as $l) {
                                            if ($res[0][6] == $l[0]){
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
                    <div id="div_lote" class="control-group">
                        <label  class="control-label">Lote</label>
						<div class="controls">
                            <input type="number" name="nu_lote" id="nu_lote" class="input-mini" min="1" max="5" value="<?php echo $res[0][1]; ?>"/>
						</div>
                    </div>
                    <div id="div_usuarios" class="control-group">
                        <label  class="control-label">Usuários</label>
						<div class="controls">
                        <input type="number" name="nu_usuarios" id="nu_usuarios" class="input-mini" maxlength="15" value="<?php echo $res[0][15]; ?>"/>
						</div>
                      </div>
                      <div id="div_instalacao" class="control-group">
                        <label  class="control-label">Instalação</label>
						<div class="controls">
                        <input type="text" name="dt_instalacao" id="dt_instalacao" class="data_ui input-small" maxlength="30" value="<?php echo date ('d/m/Y',strtotime($res[0][16])); ?>"/>
						</div>
                      </div>
                      <div id="div_homologacao" class="control-group">
                        <label  class="control-label">Homologação</label>
						<div class="controls">
                        <input type="text" name="dt_homologacao" id="dt_homologacao" class="data_ui input-small" maxlength="30" value="<?php echo date ('d/m/Y',strtotime($res[0][17])); ?>"/>
						</div>
                      </div>
                    <div id="div_status" class="control-group">
                    	 <label class="control-label"> Status</label>
						 <div class="controls">
                         <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" <?php if ($res[0][13] == 1) {echo "checked='checked'"; } ?> />Ativo</label>
                         <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" <?php if ($res[0][13] == 0) {echo "checked='checked'"; } ?>/>Inativo</label>
						 </div>
                   </div>
                </div><!--Span 7-->
                <div class="span7">
                    <div id="div_designacao" class="control-group">
                        <label  class="control-label">Designação</label>
						<div class="controls">
                        <input type="text" name="no_designacao" id="no_designacao" class="input-medium" maxlength="30" value="<?php echo $res[0][5]; ?>"/>
						</div>
                    </div>
                    <div id="div_iplan" class="control-group">
                        <label  class="control-label">IP LAN</label>
						<div class="controls">
                        <input type="text" name="nu_iplan" id="nu_iplan" class="input-medium" maxlength="30" value="<?php echo $res[0][2]; ?>"/>
						</div>
                    </div>
                    <div id="div_mascara" class="control-group">
                        <label  class="control-label">Máscara</label>
						<div class="controls">
                        <input type="text" name="nu_mascara" id="nu_mascara" class="input-medium" maxlength="30" value="<?php echo $res[0][3]; ?>"/>
						</div>
                    </div>
                    <div id="div_ipwan" class="control-group">
                        <label  class="control-label">WAN Cliente</label>
						<div class="controls">
                        <input type="text" name="wan_cliente" id="wan_cliente" class="input-medium" maxlength="30" value="<?php echo $res[0][4]; ?>"/>
						</div>
                    </div>
                      <div id="div_wan" class="control-group">
                        <label  class="control-label">WAN Operadora</label>
						<div class="controls">
                        <input type="text" name="wan_operadora" id="wan_operadora" class="input-medium" maxlength="15" value="<?php echo $res[0][18]; ?>"/>
						</div>
                    </div>
                      <div id="div_faixa" class="control-group">
                        <label  class="control-label">Faixa DHCP</label>
						<div class="controls">
                        <input type="text" name="ds_faixa" id="ds_faixa"  maxlength="30" value="<?php echo $res[0][19]; ?>"/>
						</div>
                      </div>
                </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div id="div_obs" class="control-group">
                        <label class="control-label">Observação</label>
						<div class="controls">
                        <textarea name="ds_observacao" id="ds_observacao" class="input-xxlarge" rows="1" cols="80"><?php echo $res[0][14];?></textarea>
						</div>
                      </div>
                    </div>
                </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" id="id" value="<?php echo $ID;?>"/>
                            <input type="submit" value="Cadastrar" name="salvar_circuitompls" id="salvar_circuitompls" class="btn btn-primary" />
                            <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
                        </div>
                    </div>
                    </div>
            </div><!--Span 12-->
         </form>
          </div>
    </div>
</div>
</body>
</html>	