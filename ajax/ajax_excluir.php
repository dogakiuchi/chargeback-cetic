<?php
	require ("../banco/conecta.php");
	$ID  = $_GET['id'];  //id que será deletado
	$OBJ = $_GET['obj']; //identifica qual objeto a ser deletado
    $ID_ORGAO = $_GET['idorgao'];
    $ID_UNIDADE = $_GET['idunidade'];
	
	/* Deleta Órgão */
    if ($OBJ==1){
	$sql = "DELETE FROM orgao WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../listaOrgao.php");
	}

    /* Deleta Unidade */
	if ($OBJ==2){
	$sql = "DELETE FROM unidade WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../listaUnidade.php?idorgao=$ID_ORGAO");
	}

    /* Deleta Responsável */
	if ($OBJ==3){
	$sql = "DELETE FROM responsavel WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../listaResponsavel.php?idorgao=".$ID_ORGAO."&idunidade=".$ID_UNIDADE);
	}

    /* Deleta Item de Configuração */
	if ($OBJ==4){
	$sql = "DELETE FROM itemdeconfiguracao WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../listaItemConfiguracao.php");
	}

    /* Deleta Chargeback */
	if ($OBJ==5){
	$sql = "DELETE FROM chargeback WHERE id = ".$ID;
	f_escrita($db,$sql);
	header("Location: ../detalhaChargeback.php?idorgao=$ID_ORGAO");
	}
?>