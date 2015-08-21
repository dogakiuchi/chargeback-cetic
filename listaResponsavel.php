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
        $id_unidade = $_GET['idunidade'];
		$id_orgao   = $_GET['idorgao'];

        $sql1 = "SELECT no_orgao FROM orgao WHERE id=".$id_orgao;
        $orgao = f_leitura_campo($db, $sql1);

        $sql2 = "SELECT no_unidade FROM unidade WHERE id=".$id_unidade;
        $unidade = f_leitura_campo($db, $sql2);
	?>
    <br/>
    <table class="table table-striped table-bordered" >
        <tbody>
            <tr>
                <td style="font-weight:bold">Órgão</td>
                <td><?php echo $orgao; ?></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Unidade</td>
                <td><?php echo $unidade; ?></td>
            </tr>
        </tbody>
    </table>
    <div class="navbar" style="margin-top:20px;">
        <div class="navbar-inner">
            <a class="brand" href="#">Responsáveis</a>
            <a class="iframe" style="margin-left:600px" href="cadastroResponsavel.php?id=<?php echo $id_unidade; ?>&org<?php echo $id_orgao;?>" style="text-decoration:none;"><i class="btn btn-success">Cadastro de Responsável</i></a>
    	</div>
    </div>
	<?php
        $sql = "SELECT no_responsavel, nu_telefone, no_email
                FROM responsavel
                WHERE orgao_id = ".$id_orgao." AND unidade_id = ".$id_unidade."
                ORDER BY no_responsavel";
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<br>';
            echo '<h4 style="text-align:center;">Não existe responsável cadastrado!</h4>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_orgao"  class="table table-striped table-bordered" width="100%">
            <thead>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php 
                    $count=0;
                    foreach($res as $unidade) {
                ?>
                <tr class="over" <?php if ($count==1):?> id="zebra"<?php endif;?>>
                    <td><?php echo $unidade[0]; ?></td>
                    <td><?php echo $unidade[1]; ?></td>
                    <td style="text-align:center;"><a href="listaResponsavel.php?id=<?php echo $unidade[2]; ?>" style="text-decoration:none;"><i class="icon-user"></i></a></td>
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
        <a href="listaUnidade.php?idorgao=<?php echo $id_orgao;?>"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>