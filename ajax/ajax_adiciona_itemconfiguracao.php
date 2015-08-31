<?php

require("../banco/conecta.php");

$QTD         = $_POST['QTD'];
$MATERIAIS   = isset($_POST['MATERIAIS']) ? $_POST['MATERIAIS'] : "";
$IDCATEGORIA = isset($_POST['hiddenidcategoria']) ? $_POST['hiddenidcategoria'] : "";

$where_materiais = "";

foreach ($MATERIAIS as $MATERIAL){
    $where_materiais .= " AND id <> '$MATERIAL'";
	}
	
$sql = "SELECT id, no_item
        FROM itemdeconfiguracao
        WHERE categoriaitem_id = ".$IDCATEGORIA;
$sql .= $where_materiais;


/*$var = Array(array(
        'resultado' => $sql
    ));
echo json_encode($var);
exit;*/


$res = mysql_query($sql);
	
$linhas = mysql_num_rows($res);

if ($linhas <= 0){
    $var = Array(array(
        'resultado' => '0'
    ));
    echo json_encode($var);
    exit;
}
	
$option = "";
	
while ($row = mysql_fetch_array($res)){
		$option .= "<option value='".$row['id']."'>".$row['no_item']."</option>";
}
	

$html = '<li><select class="materiais'.$QTD.'" name="materiais[]" style="width: 400px;"><option value="" selected>Escolha um item</option>'.$option.'</select><input type="text" class="qtd'.$QTD.' maskNum" name="quantidades[]" maxlength="4" style="width:50px;"> <a href="#" id ="b"><i class="icon-remove">X</i></a></li>';

	
$var = Array(array(
		'resultado' =>'1',
		'html' => $html,
		'where' => $where_materiais,
		'qtd' => $QTD	
));
	
echo json_encode($var);

?>