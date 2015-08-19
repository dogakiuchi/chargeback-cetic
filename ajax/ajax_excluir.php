<?php
	require ("../banco/conecta.php");
	$ID  = $_GET['id'];
	$OBJ = $_GET['obj'];
	
	if ($OBJ==1){
	$sql = "DELETE FROM orgao WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../listaOrgao.php");
	}
?>