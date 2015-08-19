<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Portais do Distrito Federal</title>
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
</head>
<body>

<div id="centro">

    <div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
    		<a class="brand" href="#">Órgãos da Administração Direta e Indireta</a>
			<a class="iframe" style="margin-left:600px" href="cadastroOrgao.php" style="text-decoration:none;"><i class="btn btn-success">Cadastro de Órgãos</i></a>
    	</div>
    </div>
<?php
	require ("banco/conecta.php");
    $sql = "SELECT no_orgao, no_sigla, id
            FROM orgao
            ORDER BY no_orgao";
    $res = f_leitura($db, $sql);


if (empty($res)) {
    echo '<br>';
    echo '<h3>Nenhum registro encontrado!</h3>';
} else if (!empty($res)){
?>

<table id="tabela_colorbox"  class="table table-striped table-bordered" width="100%">
	<thead>
        <th>&Oacute;rg&atilde;o</th>
        <th>Sigla</th>
        <th>Editar</th>
        <th>Detalhar</th>
        <th>Excluir</th>
    </thead>
    <tfoot>
        <th>&Oacute;rg&atilde;o</th>
        <th>Sigla</th>
        <th>Editar</th>
        <th>Detalhar</th>
        <th>Excluir</th>
    </tfoot>
    <tbody>
    <?php 
        $count=0;
        foreach($res as $site) {
    ?>
    
        <tr class="over" <?php if ($count==1):?> id="zebra"<?php endif;?>>
            <td><?php echo $site[0]; ?></td>
            <td><?php echo $site[1]; ?></td>
            <td style="text-align:center;"><a class="iframe" href="editarOrgao.php?id=<?php echo $site[2]; ?>" style="text-decoration:none;"><i class="icon-edit"></i></a></td>
            <td style="text-align:center;"><a href="detalhaOrgao.php?id=<?php echo $site[2]; ?>" style="text-decoration:none;"><i class="icon-eye-open"></i></a></td>
            <td style="text-align:center;">
				<a href="ajax/ajax_excluir.php?id=<?php echo $site[2];?>&obj=1" onClick="if(confirm('Confirma a exclusão?')){this.href;return true;}"><i class="icon-remove"></i></a>
			</td>
        </tr>
    
  <?php 
        if ($count==1){ 
            $count=0;
        }
        else{
            $count++;
        }
  
    }	//fecha foreach 
	?>
	</tbody>
  <?php
  }// fecha else if
  ?>
</table>
</div>
</body>
</html>