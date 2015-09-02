<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="utf-8" />
    <title>CeTIC</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php
		require("banco/conecta.php");
		$id = $_GET['id'];
		$sql = "SELECT * FROM dns WHERE id=".$id;
		$res = f_leitura($db, $sql);
		if ($res == true) {
	?>
    		<table class="table table-striped table-bordered">
            	<tbody>
                		<tr>
                        	<td style="font-weight:bold">Publicador</td>
                            <td><?php echo $res[0][1]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Nome do Site</td>
                            <td><?php echo $res[0][2]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Código Analytics</td>
                            <td><?php echo $res[0][3]; ?></td>
                        </tr>
                         <tr>
                        	<td style="font-weight:bold">Usuário Analytics</td>
                            <td><?php echo $res[0][13]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Senha Analytics</td>
                            <td><?php echo $res[0][14]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">IP WEB</td>
                            <td><?php echo $res[0][4]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">IP Banco</td>
                            <td><?php echo $res[0][5]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Usuário Banco</td>
                            <td><?php echo $res[0][6]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Senha Banco</td>
                            <td><?php echo $res[0][7]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Esquema Banco</td>
                            <td><?php echo $res[0][8]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">WEB SITE</td>
                            <td><?php echo $res[0][9]; ?></td>
                        </tr>
                         <tr>
                        	<td style="font-weight:bold">Tipo Portal</td>
                            <td><?php echo $res[0][10]; ?></td>
                        </tr>
                         <tr>
                        	<td style="font-weight:bold">Responsável</td>
                            <td><?php echo $res[0][15]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Telefone Responsável</td>
                            <td><?php echo $res[0][16]; ?></td>
                        </tr>
                </tbody>
            </table>
     <?php } else { ?>
     			<center> <h1>Erro</h1> </center>
     <?php } ?>

</body>
</html>
