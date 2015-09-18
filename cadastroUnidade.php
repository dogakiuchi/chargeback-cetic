<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-unidade.js"></script>
</head>
<body>
<?php
$id_orgao = $_GET['id'];
$no_orgao = $_GET['org'];
?>
	<div class="formularioModal">
	<div class="navbar">
    	<div class="navbar-inner">
        	<h4>Cadastro de Unidades</h4>
        </div>
    </div>
        <form name="form" method="post" action="" onsubmit="return false;">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
			<input type="hidden" name="id_orgao" id="id_orgao"  value="<?php echo $id_orgao;?>"/>
		    <div class="form-horizontal">
				<div id="div_orgao" class="control-group">
                        <label class="control-label">Órgão</label>
                        <div class="controls">
						<input type="text" readonly="true" name="no_orgao" id="no_orgao" class="input-xxlarge" value="<?php echo $no_orgao; ?>" />
						</div>
                </div>
            	<div id="div_nome" class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
						<input type="text" name="no_unidade" id="no_unidade" class="input-xxlarge" maxlength="100" required />
						</div>
                </div>
                <div id="div_sigla" class="control-group">
                        <label class="control-label">Sigla</label>
						<div class="controls">
                        <input type="text" name="no_sigla" id="no_sigla" class="input-small" maxlength="45" />
						</div>
                </div>
				<div id="div_endereco" class="control-group">
                        <label class="control-label">Endereço</label>
						<div class="controls">
                        <input type="text" name="no_endereco" id="no_endereco" class="input-xxlarge" maxlength="100"/>
						</div>
                </div>
				<div id="div_cidade" class="control-group">
                         <label class="control-label">Cidade</label>				
                         <div class="controls">
                            <select  name="no_cidade" id="no_cidade">
								<option value="-"></option>
                                <?php
								    require("banco/conecta.php");
								    $sql = "SELECT id, no_cidade FROM cidade ORDER BY no_cidade";
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
				<div id="div_cep" class="control-group">
                        <label class="control-label">CEP</label>
						<div class="controls">
                        <input type="text" name="nu_cep" id="nu_cep" class="input-small" maxlength="9" />
						</div>
                </div>
                <div id="div_status" class="control-group">
                    	 <label class="control-label">Status</label>
						 <div class="controls">
                         <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" checked="checked" />Ativo</label>
                         <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" />Inativo</label>
						 </div>
                </div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Cadastrar" name="salvar_unidade" id="salvar_unidade" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
                </div>
            </div>
         </form>
    </div>
 </body>
 </html>	 
    	
  
        