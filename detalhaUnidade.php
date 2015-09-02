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
		$sql = "SELECT * FROM unidade WHERE id=".$id;
		$res = f_leitura($db, $sql);
		if ($res == true) {
	?>
	    <div class="navbar" style="margin-top:20px;">
    	<div class="navbar-inner">
    		<a class="brand" href="#">Detalhamento Unidade</a>
    	</div>
		</div>
    		<table class="table table-striped table-bordered">
            	<tbody>
                        <tr>
                        	<td style="font-weight:bold">Órgão</td>
                            <?php
                                $sql1 = "SELECT no_orgao FROM orgao WHERE id=".$res[0][8];;
		                        $res1 = f_leitura($db, $sql1);
                            ?>
                            <td><?php echo $res1[0][0]; ?></td>
                        </tr>
                		<tr>
                        	<td style="font-weight:bold">Unidade</td>
                            <td><?php echo $res[0][1]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Sigla</td>
                            <td><?php echo $res[0][2]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Endereço</td>
                            <td><?php echo $res[0][3];?></td>
                        </tr>
                         <tr>
                        	<td style="font-weight:bold">CEP</td>
                            <td><?php echo $res[0][4];?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Cidade</td>
                            <?php
                                $sql2 = "SELECT no_cidade FROM cidade WHERE id=".$res[0][9];;
		                        $res2 = f_leitura($db, $sql2);
                            ?>
                            <td><?php echo $res2[0][0]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Status</td>
                            <td><?php if ($res[0][5]==1){echo "Ativo";}else{echo "Inativo";} ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Data do cadastro</td>
                            <td><?php echo $res[0][6]; ?></td>
                        </tr>
                        <tr>
                        	<td style="font-weight:bold">Data da atualização</td>
                            <td><?php echo $res[0][7]; ?></td>
                        </tr>
                </tbody>
            </table>
     <?php } else { ?>
     			<center> <h3>Erro na seleção</h3> </center>
     <?php } ?>

</body>
</html>
