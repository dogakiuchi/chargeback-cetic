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
		$sql = "SELECT c.*, o.no_sigla, u.no_unidade, i.no_item, r.no_responsavel, u.no_endereco, u.nu_cep, u.cidade_id, r.nu_telefone, r.no_email, r.nu_celular, x.no_cidade FROM circuitompls AS c
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
          <li class="active"><a href="#">Dados do Circuito</a></li>
          <li><a href="detalhaCircuitomplsTab2.php?id=<?php echo $id;?>">Endereço</a></li>
          <li><a href="detalhaCircuitomplsTab3.php?id=<?php echo $id;?>">Contato</a></li>
        </ul>
    		  <table class="table table-striped table-bordered">
            	<tbody>
                        <tr>
                        	<td class="detalhaTd">Lote</td>
                            <td><?php echo $res[0][1]; ?></td>
                            <td class="detalhaTd">Circuito</td>
                            <td><?php echo $res[0][22]; ?></td>
                        </tr>
                        <tr>
                        	<td class="detalhaTd">Órgão</td>
                            <td><?php echo $res[0][20]; ?></td>
                            <td class="detalhaTd">Designação</td>
                            <td><?php echo $res[0][5]; ?></td>
                        </tr>
                         <tr>
                        	<td class="detalhaTd">Quantidade de Usuários</td>
                            <td><?php echo $res[0][15];?></td>
                             <td class="detalhaTd">IP LAN</td>
                            <td><?php echo $res[0][2]; ?></td>
                        </tr>
                        <tr>
                        	<td class="detalhaTd">Instalado em</td>
                            <td><?php echo date('d/m/Y', strtotime($res[0][16])); ?></td>
                            <td class="detalhaTd">Máscara</td>
                            <td><?php echo $res[0][3]; ?></td>
                        </tr>
                        <tr>
                            <td class="detalhaTd">Homologado em</td>
                            <td><?php echo date('d/m/Y', strtotime($res[0][17])); ?></td>
                        	<td class="detalhaTd">WAN Cliente</td>
                            <td><?php echo $res[0][4]; ?></td>
                        </tr>
                        <tr>
                            <td class="detalhaTd">Cadastrado em</td>
                            <td><?php echo date('d/m/Y', strtotime($res[0][11])); ?></td>
                        	<td class="detalhaTd">WAN Operadora</td>
                            <td><?php echo $res[0][18]; ?></td>
                        </tr>
                        <tr>
                            <td class="detalhaTd">Atualizado em</td>
                            <td><?php if($res[0][12]==""){echo "NUNCA ATUALIZADO";}else{echo date('d/m/Y', strtotime($res[0][12]));} ?></td>
                        	<td class="detalhaTd">Faixa DHCP</td>
                            <td><?php echo $res[0][19]; ?></td>
                        </tr>
                </tbody>
              </table>
     <?php } else { ?>
     			<center> <h3>Erro na seleção</h3> </center>
     <?php } ?>
</body>
</html>
