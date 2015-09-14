<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-orgao.js"></script>
</head>
<body>
	<div class="formularioModal">
	<div class="navbar">
    	<div class="navbar-inner">
        	<h4>Cadastro de Órgãos</h4>
        </div>
    </div>
        <form name="form" method="post" action="" onsubmit="return false;">
		<input type="hidden" name="acao" id="acao"  value="cadastrar"/>
		    <div class="form-horizontal">
            	<div id="div_nome" class="control-group">
                        <label class="control-label">Nome do Órgão</label>
                        <div class="controls">
						<input type="text" name="no_orgao" id="no_orgao"  class="input-xxlarge" maxlength="100" required />
						</div>
                </div>
                <div id="div_sigla" class="control-group">
                        <label class="control-label">Sigla</label>
						<div class="controls">
                        <input type="text" name="no_sigla" id="no_sigla" class="input-small" maxlength="30" required />
						</div>
                </div>
                <div id="div_tipo" class="control-group">
                        <label class="control-label">Tipo</label>
					    <div class="controls">
                        <label class="radio inline"><input type="radio" name="tipo" id="tp_direta" value="0" checked="checked" />Administração Direta</label>
                        <label class="radio inline"><input type="radio" name="tipo" id="tp_indireta" value="1" />Administração Indireta</label> 
					    </div>					   
                </div>
                <div id="div_status" class="control-group">
                    	 <label class="control-label"> Status</label>
						 <div class="controls">
                         <label class="radio inline"><input type="radio" name="status" id="ativo" value="1" checked="checked" />Ativo</label>
                         <label class="radio inline"><input type="radio" name="status" id="inativo" value="0" />Inativo</label>
						 </div>
                </div>
                <div class="control-group">
					<div class="controls">
                    <input type="submit" value="Cadastrar" name="salvar_orgao" id="salvar_orgao" class="btn btn-primary" />
                    <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
					</div>
                </div>
            </div>
         </form>
    </div>
 </body>
 </html>	 
    	
  
        