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
    $NU_CELULAR    = $_POST['NU_CELULAR'];
	$NO_EMAIL      = $_POST['NO_EMAIL'];
	$STATUS        = $_POST['STATUS'];
    $DS_OBSERVACAO = $_POST['DS_OBSERVACAO'];
	$ID_ORGAO      = $_POST['ID_ORGAO'];
    $ID_UNIDADE    = $_POST['ID_UNIDADE'];

		
	$sql = "INSERT INTO `responsavel`
					(`no_responsavel`,
					`nu_telefone`,
                    `nu_celular`,
					`no_email`,
					`status`,
                    `ds_observacao`,
					`orgao_id`,
                    `unidade_id`,
					`dt_cadastro`)
				VALUES
					('".$NO_RESPONSAVEL."',
					 '".$NU_TELEFONE."',
                     '".$NU_CELULAR."',
					 '".$NO_EMAIL."',
					 '".$STATUS."',
                     '".$DS_OBSERVACAO."',
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

/* ########################### CADASTRAR ITEM DE CONFIGURAÇÃO ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_itemdeconfiguracao'){
	$NO_ITEM         = $_POST['NO_ITEM'];
    $DS_CONFIGURACAO = $_POST['DS_CONFIGURACAO'];
	$ID_CATEGORIA = $_POST['ID_CATEGORIA'];
	$DS_DESCRICAO = $_POST['DS_DESCRICAO'];
	$STATUS       = $_POST['STATUS'];
	$NU_CUSTO     = $_POST['NU_CUSTO'];
		
	$sql = "INSERT INTO `itemdeconfiguracao`
					(`no_item`,
					`ds_descricao`,
                    `ds_configuracao`,
					`nu_custo_mensal`,
					`categoriaitem_id`,
                    `status`,
					`dt_cadastro`)
				VALUES
					('".$NO_ITEM."',
					 '".$DS_DESCRICAO."',
                     '".$DS_CONFIGURACAO."',
					 '".$NU_CUSTO."',
					 '".$ID_CATEGORIA."',
                     '".$STATUS."',
					now());";
					
	/*$var = Array(array('resultado' => $sql));
	echo json_encode($var);
	exit;*/
	
	f_escrita($db, $sql);
		
	$var = Array(array('resultado' => 0));
	echo json_encode($var);
	exit;	
}

/* ########################### CADASTRAR CHARGEBACK ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_chargeback'){
	$ID_ITEM      = $_POST['ID_ITEM'];
	$QTD          = $_POST['NU_QTD'];
	$ID_CATEGORIA = $_POST['ID_CATEGORIA'];
    $ID_ORGAO     = $_POST['ID_ORGAO'];
    $ID_UNIDADE   = $_POST['ID_UNIDADE'];

    for ($x = 0; $x < sizeof($ID_ITEM); $x++) {
        $verificaitem = "SELECT id FROM chargeback WHERE unidade_id = ".$ID_UNIDADE." AND itemdeconfiguracao_id = ".$ID_ITEM[$x];
        $retorno = f_leitura($db, $verificaitem);
        if($retorno){
            $var = Array(array('resultado' => 1));
            echo json_encode($var);
            exit;
        } else {
            $sql = "INSERT INTO `chargeback`
                                (`nu_qtd`,
                                 `unidade_id`,
                                 `orgao_id`,
                                 `itemdeconfiguracao_id`,
                                 `categoriaitem_id`,
                                 `dt_cadastro`)
			             VALUES ('$QTD[$x]',
                                 '$ID_UNIDADE',
                                 '$ID_ORGAO',
                                 '$ID_ITEM[$x]',
                                 '$ID_CATEGORIA',
                                 now())";
            f_escrita($db, $sql);
        }
    }
    $var = Array(array('resultado' => 0));
    echo json_encode($var);
    exit;

}

/* ########################### CADASTRAR CIRCUITO MPLS ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'cadastrar_circuitompls'){
	$NU_LOTE        = $_POST['NU_LOTE'];
	$NU_IPLAN       = $_POST['NU_IPLAN'];
    $NU_MASCARA     = $_POST['NU_MASCARA'];
	$NU_IPWAN       = $_POST['NU_IPWAN'];
	$NO_DESIGNACAO  = $_POST['NO_DESIGNACAO'];
	$ID_ORGAO       = $_POST['ID_ORGAO'];
    $ID_UNIDADE     = $_POST['ID_UNIDADE'];
    $ID_RESPONSAVEL = $_POST['ID_RESPONSAVEL'];
    $ID_CATEGORIA   = $_POST['ID_CATEGORIA'];
    $ID_ITEM        = $_POST['ID_ITEM'];

		
	$sql = "INSERT INTO `circuitompls`
					(`nu_lote`,
					`ip_lan`,
                    `ip_mascara`,
					`ip_wan`,
					`no_designacao`,
					`orgao_id`,
                    `unidade_id`,
                    `responsavel_id`,
                    `categoriaitem_id`,
                    `itemdeconfiguracao_id`,
					`dt_cadastro`)
				VALUES
					('".$NU_LOTE."',
					 '".$NU_IPLAN."',
                     '".$NU_MASCARA."',
					 '".$NU_IPWAN."',
					 '".$NO_DESIGNACAO."',
					 '".$ID_ORGAO."',
                     '".$ID_UNIDADE."',
                     '".$ID_RESPONSAVEL."',
                     '".$ID_CATEGORIA."',
                     '".$ID_ITEM."',
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