<?php
require ("../banco/conecta.php");

$id_categoria = mysql_real_escape_string( $_GET['no_categoria'] );

$itens = array();

$sqlitem = "SELECT id, no_item
		FROM itemdeconfiguracao
		WHERE categoriaitem_id=$id_categoria
		ORDER BY no_item";
$resitem = mysql_query( $sqlitem );
while ( $rowitem = mysql_fetch_assoc( $resitem ) ) {
	$itens[] = array(
		'id'	   => $rowitem['id'],
		'no_item'  => $rowitem['no_item'],
	);
}

echo( json_encode( $itens ) );
?>