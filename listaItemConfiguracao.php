<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CeTIC</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/chosen.css" type="text/css" rel="stylesheet">
<link href="plug-in/dataTable-1.10.0/media/css/jquery.dataTables.css" type="text/css" rel="stylesheet">
<link href="plug-in/dataTable-1.10.0/media/css/dataTable.tableTools.css" type="text/css" rel="stylesheet">
<link href="css/colorbox.css" rel="stylesheet" type="text/css">
<script type="text/javascript" charset="utf-8" src="plug-in/dataTable-1.10.0/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="plug-in/dataTable-1.10.0/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="plug-in/dataTable-1.10.0/media/js/dataTables.tableTools.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" charset="utf-8" src="js/colorbox.js"></script>
<style type="text/css">
body {
	margin:0;
	padding:0;
	text-align:center; /* hack para o IE */	
	}
#tudo {
	width: 1024px;
	margin:0 auto;			
	text-align:left; /* "remédio" para o hack do IE */	
	}
</style>
</head>
<body >
<div id="tudo">
    <?php
        require("banco/conecta.php");
	?>
    <br/>
    <div class="navbar" style="margin-top:20px;">
        <div class="navbar-inner">
            <a class="brand" href="#">Itens de Configuração</a>
            <a class="iframe" style="margin-left:600px" href="cadastroItemConfiguracao.php" style="text-decoration:none;"><i class="btn btn-success">Cadastro de IC</i></a>
    	</div>
    </div>
	<?php
        $sql = "SELECT *
                FROM itemdeconfiguracao
                ORDER BY no_item";
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<br>';
            echo '<h4 style="text-align:center;">Não existem itens de configuração cadastrados!</h4>';
            echo '<br>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_colorbox"  class="table table-striped table-bordered" width="100%">
            <thead>
                <th>Item</th>
                <th>Categoria</th>
                <th>Custo</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php 
                    foreach($res as $item) {
                ?>
                <tr class="over">
                    <td><?php echo $item[1]; ?></td>
                    <?php
                        $sql2 = "SELECT no_categoriaitem FROM categoriaitem WHERE id=".$item[6];
                        $categoria = f_leitura_campo($db, $sql2);
                        ?>
                    <td><?php echo $categoria; ?></td>
                    <td><?php echo $item[3]; ?></td>
                    <td style="text-align:center;"><a class="iframe" href="editarItemConfiguracao.php?id=<?php echo $item[0]; ?>" style="text-decoration:none;"><i class="icon-edit"></i></a></td>
                    <td style="text-align:center;"><a class="iframe" href="detalhaItemConfiguracao.php?id=<?php echo $item[0]; ?>" style="text-decoration:none;"><i class="icon-eye-open"></i></a></td>
                    <td style="text-align:center;"><a href="ajax/ajax_excluir.php?id=<?php echo $item[0];?>" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
                </tr>
                <?php 
  
                    }	//fecha foreach 
                ?>
            </tbody>
    <?php
        }// fecha else if
    ?>
    </table>
<div class="navbar" style="margin-top:20px;">
    <div class="navbar-inner" style="text-align:center;">
        <a href="#"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>