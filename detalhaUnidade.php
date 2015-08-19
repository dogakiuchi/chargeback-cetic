<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>GoTIC</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php
		require("banco/conecta.php");
		$id = $_GET['id'];
		$sql = "SELECT * FROM orgao WHERE id=".$id;
		$res = f_leitura($db, $sql);
		if ($res == true) {
	?>
	    <div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
    		<a class="brand" href="#">Detalhamento Órgão</a>
    	</div>
		</div>
    		<table class="table table-striped table-bordered">
            	<tbody>
                		<tr>
                        	<td style="font-weight:bold">Órgão</td>
                            <td><?php echo $res[0][1]; ?></td>
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
     <?php } else { ?>
     			<center> <h3>Erro na seleção</h3> </center>
     <?php } ?>

</body>
</html>
