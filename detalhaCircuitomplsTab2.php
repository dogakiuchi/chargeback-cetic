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
		$sql = "SELECT c.*, o.no_orgao, u.no_unidade, i.no_item, r.no_responsavel, u.no_endereco, u.nu_cep, u.cidade_id, r.nu_telefone, r.no_email, r.nu_celular, x.no_cidade FROM circuitompls AS c
                INNER JOIN orgao AS o ON c.orgao_id = o.id
                INNER JOIN unidade AS u ON c.unidade_id = u.id
                INNER JOIN cidade AS x ON u.cidade_id = x.id
                INNER JOIN responsavel AS r ON c.responsavel_id = r.id
                INNER JOIN itemdeconfiguracao AS i ON c.itemdeconfiguracao_id = i.id
                WHERE c.id = ".$id;
		$res = f_leitura($db, $sql);
		if ($res == true) {
	?>
	    <div class="navbar">
    	<div class="navbar-inner">
    		<h4>Detalhamento Circuito MPLS</h4>
    	</div>
		</div>
        <ul class="nav nav-tabs">
          <li><a href="detalhaCircuitomplsTab1.php?id=<?php echo $id;?>">Dados do Circuito</a></li>
          <li class="active"><a href="#">Endereço</a></li>
          <li><a href="detalhaCircuitomplsTab3.php?id=<?php echo $id;?>">Contato</a></li>
        </ul>
    		<table class="table table-striped table-bordered">
            	<tbody>
                        <tr>
                        	<td class="minhaTd">Unidade</td>
                            <td><?php echo $res[0][20]; ?></td>
                        </tr>
                        <tr>
                        	<td class="minhaTd">Endereço</td>
                            <td><?php echo $res[0][23]; ?></td>
                        </tr>
                        <tr>
                        	<td class="minhaTd">Cidade</td>
                            <td><?php echo $res[0][29];?></td>
                        </tr>
                        <tr>
                        	<td class="minhaTd">CEP</td>
                            <td><?php echo $res[0][24]; ?></td>
                        </tr>
                        <tr>
                </tbody>
            </table>
     <?php } else { ?>
     			<center> <h3>Erro na seleção</h3> </center>
     <?php } ?>

</body>
</html>