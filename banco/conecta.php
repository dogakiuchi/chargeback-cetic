<?php
$hostname = "10.72.31.141";
$banco = "db_portais";
$usuario = "adm_portais";
$senha = "4dM_P08t415_Pwd";
$db = mysql_connect($hostname, $usuario, $senha);
    if (!$db) {
        die('Could not connect: ' . mysql_error());
    }
mysql_select_db($banco, $db);
mysql_query("SET NAMES utf8");
function f_leitura($db,$sql){
  $res_query = mysql_query($sql,$db);
    $res = array();
  	while($resultado = mysql_fetch_array($res_query)){
   	 $res[] = $resultado;
   	}
  return $res;
}

function f_escrita($db, $sql){
	mysql_query($sql, $db) or die ("Erro de SQL: ".mysql_error());	
}

function f_rows($db, $sql){
	$res = mysql_query($sql, $db) or die ("Erro de SQL: ".mysql_error());
	$rows = mysql_num_rows($res);
	return $rows;	
}

?>
