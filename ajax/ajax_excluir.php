<?php
	require ("../banco/conecta.php");
	$ID  = $_GET['id'];
	$OBJ = $_GET['obj'];
    $IDR = $_GET['idr'];
	
	if ($OBJ==1){
	$sql = "DELETE FROM orgao WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../listaOrgao.php");
	}

	if ($OBJ==2){
	$sql = "DELETE FROM unidade WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../detalhaOrgao.php?id=$IDR");
	}
?>