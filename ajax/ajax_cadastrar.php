<?php
/* ########################### CADASTRAR PORTAL ##########################################*/
require("../banco/conecta.php");
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_portal'){
    $ID_ORGAO = $_POST['ID_ORGAO'];
	$NO_DNS = $_POST['NO_DNS'];
	$NO_SITE = $_POST['NO_SITE'];
	$CODIGO_ANALYTICS = $_POST['CODIGO_ANALYTICS'];
	$IP_HTML = $_POST['IP_HTML'];
	$IP_BANCO = $_POST['IP_BANCO'];
	$USUARIO_BANCO = $_POST['USUARIO_BANCO'];
	$PWD_BANCO = $_POST['PWD_BANCO'];
	$ESQUEMA_BANCO = $_POST['ESQUEMA_BANCO'];
	$DS_WEBSITE = $_POST['DS_WEBSITE'];
	$TP_PORTAL = $_POST['TP_PORTAL'];
	$PREFIXO_TABELA = $_POST['PREFIXO_TABELA'];
	$ST_TOKEN = $_POST['ST_TOKEN'];
	$USUARIO_ANALYTICS = $_POST['USUARIO_ANALYTICS'];
	$SENHA_ANALYTICS = $_POST['SENHA_ANALYTICS'];
	$NO_RESPONSAVEL = isset($_POST['NO_RESPONSAVEL']) ? $_POST['NO_RESPONSAVEL'] : "";
	$RESP_TELEFONE = isset($_POST['RESP_TELEFONE']) ? $_POST['RESP_TELEFONE'] : "";
	$RESP_ID = 1;
	
	$sql_ver_portal = "SELECT no_dns FROM dns WHERE no_dns LIKE '".$NO_DNS."'";
	$rows_ver_portal = f_rows($db, $sql_ver_portal);

	if ($rows_ver_portal > 0){
		$var = Array(array(
			'resultado' => 1
		));	
		echo json_encode($var);
		exit;
	}
	
		$sql = "INSERT INTO `dns`
					(`id`,
					`orgao_id`,
					`responsavel_id`,
					`no_dns`,
					`no_site`,
					`codigo_analytics`,
					`ip_html`,
					`ip_banco`,
					`usuario_banco`,
					`pwd_banco`,
					`esquema_banco`,
					`ds_website`,
					`tp_portal`,
					`prefixo_tabela`,
					`st_token`,
					`usuario_analytics`,
					`senha_analytics`,
					`no_responsavel`,
					`resp_telefone`,
					`dt_cadastro`)
				VALUES
					(NULL,
					'".$ID_ORGAO."',
					'".$RESP_ID."',
					'".$NO_DNS."',
					'".$NO_SITE."',
					'".$CODIGO_ANALYTICS."',
					'".$IP_HTML."',
					'".$IP_BANCO."',
					'".$USUARIO_BANCO."',
					'".$PWD_BANCO."',
					'".$ESQUEMA_BANCO."',
					'".$DS_WEBSITE."',
					'".$TP_PORTAL."',
					'".$PREFIXO_TABELA."',
					'".$ST_TOKEN."',
					'".$USUARIO_ANALYTICS."',
					'".$SENHA_ANALYTICS."',
					'".$NO_RESPONSAVEL."',
					'".$RESP_TELEFONE."',
					now());";
					
		f_escrita($db, $sql);
		
		$var = Array(array(
			'resultado' => 0
		));
		
		echo json_encode($var);
		exit;	
}
/* ########################### CADASTRAR ÓRGÃO ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_orgao'){
	$NO_ORGAO    = $_POST['NO_ORGAO'];
	$NO_SIGLA    = $_POST['NO_SIGLA'];
	$TIPO        = $_POST['TIPO'];
	$STATUS      = $_POST['STATUS'];
	
	$sql_ver_orgao = "SELECT no_orgao FROM orgao WHERE no_orgao LIKE '".$NO_ORGAO."'";
	$rows_ver_orgao = f_rows($db, $sql_ver_orgao);

	if ($rows_ver_orgao > 0){
		$var = Array(array(
			'resultado' => 1
		));	
		echo json_encode($var);
		exit;
	}
	
	$sql = "INSERT INTO `orgao`
					(`id`,
					`no_orgao`,
					`no_sigla`,
					`tp_orgao`,
					`status`,
					`dt_cadastro`)
				VALUES
					(NULL,
					'".$NO_ORGAO."',
					'".$NO_SIGLA."',
					'".$TIPO."',
					'".$STATUS."',
					now());";
					
		f_escrita($db, $sql);
		
		$var = Array(array(
			'resultado' => 0
		));
		
		echo json_encode($var);
		exit;	
}
/* ########################### CADASTRAR UNIDADE ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_unidade'){
	$NO_UNIDADE = $_POST['NO_UNIDADE'];
	$NO_SIGLA   = $_POST['NO_SIGLA'];
	$NO_ENDERECO = $_POST['NO_ENDERECO'];
	$ID_CIDADE   = $_POST['ID_CIDADE'];
	$NU_CEP      = $_POST['NU_CEP'];
	$STATUS     = $_POST['STATUS'];
	$ID_ORGAO   = $_POST['ID_ORGAO'];

		
	$sql = "INSERT INTO `unidade`
					(`no_unidade`,
					`no_sigla`,
					`no_endereco`,
					`cidade_id`,
					`nu_cep`,
					`status`,
					`orgao_id`,
					`dt_cadastro`)
				VALUES
					('".$NO_UNIDADE."',
					 '".$NO_SIGLA."',
					 '".$NO_ENDERECO."',
					 '".$ID_CIDADE."',
					 '".$NU_CEP."',
					 '".$STATUS."',
					 '".$ID_ORGAO."',
					now());";
					
	/*$var = Array(array('resultado' => $sql));
	echo json_encode($var);
	exit;*/
	
	f_escrita($db, $sql);
		
	$var = Array(array('resultado' => 0));
	echo json_encode($var);
	exit;	
}
/* ########################### CADASTRAR RESPONSÁVEL ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_responsavel'){
	$NO_RESPONSAVEL = $_POST['NO_RESPONSAVEL'];
	$NU_TELEFONE   = $_POST['NU_TELEFONE'];
	$NO_EMAIL = $_POST['NO_EMAIL'];
	$STATUS     = $_POST['STATUS'];
	$ID_ORGAO   = $_POST['ID_ORGAO'];
    $ID_UNIDADE = $_POST['ID_UNIDADE'];

		
	$sql = "INSERT INTO `responsavel`
					(`no_responsavel`,
					`nu_telefone`,
					`no_email`,
					`status`,
					`orgao_id`,
                    `unidade_id`,
					`dt_cadastro`)
				VALUES
					('".$NO_RESPONSAVEL."',
					 '".$NU_TELEFONE."',
					 '".$NO_EMAIL."',
					 '".$STATUS."',
					 '".$ID_ORGAO."',
                     '".$ID_UNIDADE."',
					now());";
					
	/*$var = Array(array('resultado' => $sql));
	echo json_encode($var);
	exit;*/
	
	f_escrita($db, $sql);
		
	$var = Array(array('resultado' => 0));
	echo json_encode($var);
	exit;	
}

?>