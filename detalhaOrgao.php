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
            <a class="iframe" style="margin-left:700px" href="cadastroUnidade.php?id=<?php echo $id_orgao; ?>&org=<?php echo $org; ?>" style="text-decoration:none;"><i class="btn btn-success">Cadastro de Unidade</i></a>
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
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tfoot>
                <th>Unidade</th>
                <th>Sigla</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </tfoot>
            <tbody>
                <?php 
                    $count=0;
                    foreach($res as $unidade) {
                ?>
                <tr class="over" <?php if ($count==1):?> id="zebra"<?php endif;?>>
                    <td><?php echo $unidade[0]; ?></td>
                    <td><?php echo $unidade[1]; ?></td>
                    <td style="text-align:center;"><a class="iframe" href="editarUnidade.php?id=<?php echo $unidade[2]; ?>" style="text-decoration:none;"><i class="icon-edit"></i></a></td>
                    <td style="text-align:center;"><a class="iframe" href="detalhaUnidade.php?id=<?php echo $unidade[2]; ?>" style="text-decoration:none;"><i class="icon-eye-open"></i></a></td>
                    <td style="text-align:center;"><a href="ajax/ajax_excluir.php?id=<?php echo $unidade[2];?>&obj=2&idr=<?php echo $id_orgao;?>" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
                </tr>
                <?php 
                        if ($count==1){
                            $count=0;
                        }
                        else {
                            $count++;
                        }
  
                    }	//fecha foreach 
                ?>
            </tbody>
    <?php
        }// fecha else if
    ?>
    </table>
<div class="navbar" style="margin-top:20px;">
    <div class="navbar-inner" style="text-align:center;">
        <a href="listaOrgao.php"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>
