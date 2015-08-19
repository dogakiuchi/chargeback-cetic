<?php
	require ("banco/conecta.php");
	$ID = $_GET['id'];
	
	$sql = "DELETE FROM dns WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: index.php");
?>