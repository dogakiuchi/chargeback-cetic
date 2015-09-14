<?php
 require('headFormCadastro.php');
?>
<!--Scripts exclusivos do formulário-->
<script src="js/valida-chargeback.js"></script>
</head>
<body>
<?php
  require("banco/conecta.php");
  $id = $_GET['id'];
  $sql = "SELECT c.nu_qtd, o.no_orgao, u.no_unidade, i.no_item FROM chargeback AS c
          INNER JOIN orgao AS o ON c.orgao_id = o.id
          INNER JOIN unidade AS u ON c.unidade_id = u.id
          INNER JOIN itemdeconfiguracao AS i ON c.itemdeconfiguracao_id = i.id
          WHERE c.id=".$id;
  $result = f_leitura($db,$sql);
?>
    <div class="formularioModal">
    <div class="navbar">
        <div class="navbar-inner">
            <h4>Cadastro Chargeback</h4>
        </div>
    </div>
	<div>
        <form name="form" method="post" id="charge" action="" onsubmit="return false;" class="form-horizontal">
                <div id="div_orgao" class="control-group">
                         <label class="control-label">Órgão</label>
                            <div class="controls">
                            <input type="text" class="meuInput" name="no_orgao" id="no_orgao" value="<?php echo $result[0][1];?>" disabled>
                            </div>
                </div>
                <div id="div_unidade" class="control-group">
                         <label class="control-label">Unidade</label>	
                            <div class="controls">
                                <input  type="text" name="no_unidade" id="no_unidade" class="meuInput" value="<?php echo $result[0][2];?>" disabled>
                            </div>
                </div>
                <div id="div_unidade" class="control-group">
                         <label class="control-label">Item</label>	
                            <div class="controls">
                                <input  type="text" name="no_item" id="no_item" class="meuInput" value="<?php echo $result[0][3];?>" disabled>
                            </div>
                </div>
                
                <div class="control-group">
                        <label class="control-label">Quantidade</label>
                        <div class="controls">
                        <input type="text" class="qtd1 maskNum" name="qtd"  id="qtd" maxlength="4" style="width:25px;" value="<?php echo $result[0][0];?>">
                        </div>
                </div>

                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                            <input type="button" value="Cadastrar" id="salvar_chargeback" class="btn btn-primary"/>
                            <input type="button" value="VOLTAR" id="voltar" class="btn" onClick="parent.$.fn.colorbox.close();" />
                        </div>
                    </div>
         </form>
    </div>
</div>
</body>
</html>	 
    	
  
        