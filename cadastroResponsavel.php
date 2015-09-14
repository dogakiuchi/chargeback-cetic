<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-responsavel.js"></script>
</head>
<body>
<?php
$id_orgao = $_GET['idorgao'];
$id_unidade = $_GET['idunidade'];

require("banco/conecta.php");
$sql1 = "SELECT o.no_orgao, u.no_unidade FROM unidade AS u INNER JOIN orgao AS o ON o.id = u.orgao_id WHERE u.id=".$id_unidade;
$orgaounidade = f_leitura($db, $sql1);

?>
	<div class="formularioModal">
	<div class="navbar">
    	<div class="navbar-inner">
        	<h4 class="title_cadastro_portais">Cadastro de Responsável</h4>
        </div>
    </div>
        <form name="form" method="post" action="" onsubmit="return false;">
		    <input type="hidden" name="acao" id="acao"  value="cadastrar"/>
			<input type="hidden" name="id_orgao" id="id_orgao"  value="<?php echo $id_orgao;?>"/>
            <input type="hidden" name="id_unidade" id="id_unidade"  value="<?php echo $id_unidade;?>"/>
		    <div class="form-horizontal">
				<div id="div_orgao" class="control-group">
                        <label  class="control-label">Órgão</label>
                        <div class="controls">
						<input type="text" readonly="true" name="no_orgao" id="no_orgao" class="input-xxlarge" value="<?php echo $orgaounidade[0][0]; ?>" />
						</div>
                </div>
                <div id="div_unidade" class="control-group">
                        <label  class="control-label">Unidade</label>
                        <div class="controls">
						<input type="text" readonly="true" name="no_unidade" id="no_unidade" class="input-xxlarge" value="<?php echo $orgaounidade[0][1]; ?>" />
						</div>
                </div>
            	<div id="div_nome" class="control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls">
						<input type="text" name="no_responsavel" id="no_responsavel" class="input-xxlarge" maxlength="100" required />
						</div>
                </div>
                <div id="div_telefone" class="control-group">
                        <label class="control-label">Telefone</label>
						<div class="controls">
                        <input type="text" name="nu_telefone" id="nu_telefone" class="input-medium" maxlength="15" />
						</div>
                </div>
                <div id="div_celular" class="control-group">
                        <label  class="control-label">Celular</label>
						<div class="controls">
                        <input type="text" name="nu_celular" id="nu_celular" class="input-medium" maxlength="15" />
						</div>
                </div>
				<div id="div_endereco" class="control-group">
                        <label class="control-label">E-mail</label>
						<div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="text" name="no_email" id="no_email" class="input-xlarge" maxlength="100"/>
                            </div>
						</div>
                </div>
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
                        <textarea name="ds_observacao" id="ds_observacao" class="input-xxlarge" rows="2" cols="100"></textarea>
						</div>
                </div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Cadastrar" name="salvar_responsavel" id="salvar_responsavel" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
                </div>
            </div>
         </form>
    </div>
 </body>
 </html>	 
    	
  
        