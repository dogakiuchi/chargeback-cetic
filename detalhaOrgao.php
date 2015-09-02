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
<body >
<div id="tudo">
    <?php
        require("banco/conecta.php");
		$id_orgao = $_GET['id'];
		$sql = "SELECT * FROM orgao WHERE id=".$id_orgao;
		$res = f_leitura($db, $sql);
		if ($res == true) {
	?>
	    <div class="navbar" style="margin-top:20px;">
    	   <div class="navbar-inner">
            <a class="brand" href="#">Detalhamento Órgão</a>
    	   </div>
		</div>
    	<table class="table table-striped table-bordered" >
            <tbody>
                <tr>
                    <td style="font-weight:bold">Órgão</td>
                    <td><?php echo $res[0][1]; $org = $res[0][1];?></td>
                </tr>
                <tr>
                	<td style="font-weight:bold">Sigla</td>
                    <td><?php echo $res[0][2]; ?></td>
                </tr>
                <tr>
                	<td style="font-weight:bold">Tipo</td>
                    <td><?php if ($res[0][3]==0){echo "Administração Direta";}else{echo "Administração Indireta";}?></td>
                </tr>
                 <tr>
                	<td style="font-weight:bold">Status</td>
                    <td><?php if ($res[0][4]==1){echo "Ativo";}else{echo "Inativo";} ?></td>
                </tr>
                <tr>
                	<td style="font-weight:bold">Data do cadastro</td>
                    <td><?php echo $res[0][5]; ?></td>
                </tr>
                <tr>
                	<td style="font-weight:bold">Data da atualização</td>
                    <td><?php echo $res[0][6]; ?></td>
                </tr>
            </tbody>
        </table>
    <?php 
        } else { 
    ?>
        <center> <h3>Erro na seleção</h3> </center>
    <?php 
        }
    ?>
<!-- ########################################  UNIDADES #########################################-->
    <div class="navbar" style="margin-top:20px;">
        <div class="navbar-inner">
            <a class="brand" href="#">Unidades</a>
    	</div>
    </div>
	<?php
        $sql = "SELECT no_unidade, no_sigla, id
                FROM unidade
                WHERE orgao_id = ".$id_orgao."
                ORDER BY no_unidade";
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<br>';
            echo '<h4 style="text-align:center;">Não existem unidades cadastradas!</h4>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_orgao"  class="table table-striped table-bordered" width="100%">
            <thead>
                <th>Unidade</th>
                <th>Sigla</th>
            </thead>
            <tbody>
                <?php 
                    $count=0;
                    foreach($res as $unidade) {
                ?>
                <tr >
                    <td><?php echo $unidade[0]; ?></td>
                    <td><?php echo $unidade[1]; ?></td>
                </tr>
                <?php 
  
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
