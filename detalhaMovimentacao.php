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
		$sql = "SELECT m.*, u.no_unidade, i.no_item FROM movimentacaocircuito AS m
                INNER JOIN unidade AS u ON m.unidade_id = u.id
                INNER JOIN itemdeconfiguracao AS i ON m.itemdeconfiguracao_id = i.id
                WHERE m.id =".$id;
		$res = f_leitura($db, $sql);
		if ($res == true) {
	?>
	    <div class="navbar">
    	<div class="navbar-inner">
    		<h4>Detalhamento Movimentação</h4>
    	</div>
		</div>
    		  <table class="table table-striped table-bordered">
            	<tbody>
                        <tr>
                        	<td class="detalhaTd">Unidade Anterior</td>
                            <td><?php echo $res[0][15]; ?></td>
                            <td class="detalhaTd">WAN Operadora Anterior</td>
                            <td><?php echo $res[0][5]; ?></td>
                        </tr>
                        <tr>
                        	<td class="detalhaTd">Circuito Anterior</td>
                            <td><?php echo $res[0][16]; ?></td>
                            <td class="detalhaTd">Instalação</td>
                            <td><?php echo date('d/m/Y', strtotime($res[0][8])); ?></td>
                        </tr>
                         <tr>
                        	<td class="detalhaTd">Designação Anterior</td>
                            <td><?php echo $res[0][6];?></td>
                             <td class="detalhaTd">Homologação</td>
                            <td><?php echo date('d/m/Y', strtotime($res[0][9])); ?></td>
                        </tr>
                        <tr>
                        	<td class="detalhaTd">IP Anterior</td>
                            <td><?php echo $res[0][2]; ?></td>
                            <td class="detalhaTd">Cadastro</td>
                            <td><?php echo date('d/m/Y', strtotime($res[0][10])); ?></td>
                        </tr>
                        <tr>
                            <td class="detalhaTd">Máscara Anterior</td>
                            <td><?php echo $res[0][3]; ?></td>
                        	<td class="detalhaTd">Atualização</td>
                            <td><?php if($res[0][11]==""){echo "NUNCA ATUALIZADO";}else{echo date('d/m/Y', strtotime($res[0][11]));} ?></td>
                        </tr>
                        <tr>
                            <td class="detalhaTd">WAN Cliente Anterior</td>
                            <td><?php echo $res[0][4]; ?></td>
                        	<td class="detalhaTd">Observação</td>
                            <td><?php echo $res[0][7]; ?></td>
                        </tr>
                </tbody>
              </table>
     <?php } else { ?>
     			<center> <h3>Erro na seleção</h3> </center>
     <?php } ?>
</body>
</html>
