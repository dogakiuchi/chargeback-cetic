<?php
require ("../banco/conecta.php");

$id_orgao = mysql_real_escape_string( $_GET['no_orgao'] );

$unidades = array();

$sql = "SELECT id, no_unidade
		FROM unidade
		WHERE orgao_id=$id_orgao
		ORDER BY no_unidade";
$res = mysql_query( $sql );
while ( $row = mysql_fetch_assoc( $res ) ) {
	$unidades[] = array(
		'id'	=> $row['id'],
		'no_unidade'			=> $row['no_unidade'],
	);
}

echo( json_encode( $unidades ) );
?>