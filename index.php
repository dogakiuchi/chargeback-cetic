<!DOCTYPE html>
<html>
<head lang="pt-br">
<meta charset="utf-8" />
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
</head>
<body>

<?php
    require ("banco/conecta.php");
    $url     = (isset($_GET['DNS'])) ? $_GET['DNS'] : '';
    if($url!=''){header("Location: http://$url");}
?>
<div id="centro">

    <div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
    		<a class="brand" href="#">Sites Hospedados</a>
            <a class="iframe" style="margin-left:765px" href="cadastro.php" style="text-decoration:none;"><i class="btn btn-success">Cadastro de Site</i></a>
    	</div>
    </div>
<?php

    $sql = "SELECT no_dns, no_site, ds_website, id, st_token
            FROM dns
            ORDER BY no_site";
    $res = f_leitura($db, $sql);


if (empty($res)) {
    echo '<br>';
    echo '<h3>Nenhum registro encontrado!</h3>';
} else if (!empty($res)){
?>

<table id="tabela_colorbox"  class="table table-striped table-bordered" width="100%">
	<thead>
        <th>Nome do Site</th>
        <th>Publicador</th>
        <th>Site</th>
        <th>Editar</th>
        <th>Detalhar</th>
        <th>Excluir</th>
    </thead>
    <tfoot>
        <th>Nome do Site</th>
        <th>Publicador</th>
        <th>Site</th>
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
            <td><?php echo  $site[1]; if ($site[4]=="SIM"){echo "<i class='icon-lock'></i>";}?></td>
            <td><?php echo "<a target='_blank' href='http://".$site[0]."'>".$site[0]."</a>";?></td>
            <td><a target="_blank" href="<?php echo $site[2];?>"><?php echo  $site[2];?></a></td>
            <td style="text-align:center;"><a class="iframe" href="editarPortal.php?id=<?php echo $site[3]; ?>" style="text-decoration:none;"><i class="icon-edit"></i></a></td>
            <td style="text-align:center;"><a class="iframe" href="detalhaPortal.php?id=<?php echo $site[3]; ?>" style="text-decoration:none;"><i class="icon-eye-open"></i></a></td>
            <td style="text-align:center;"><a class="" href="excluir.php?id=<?php echo $site[3]; ?>" style="text-decoration:none;"><i class="icon-remove"></i></a></td>
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