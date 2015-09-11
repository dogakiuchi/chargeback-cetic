<?php
require ("../banco/conecta.php");

$id_unidade = mysql_real_escape_string( $_GET['no_unidade'] );

$responsaveis = array();

$sql = "SELECT id, no_responsavel
		FROM responsavel
		WHERE unidade_id=".$id_unidade." ORDER BY no_responsavel";
$res = mysql_query( $sql );
while ( $row = mysql_fetch_assoc( $res ) ) {
	$responsaveis[] = array(
		'id'	          => $row['id'],
		'no_responsavel'  => $row['no_responsavel'],
	);
}

echo( json_encode( $responsaveis ) );
?>