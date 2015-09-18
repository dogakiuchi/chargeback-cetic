<?php

/* ########################### EDITAR PORTAL ##########################################*/
require("../banco/conecta.php");
if (isset($_POST['acao']) && $_POST['acao'] == 'editar_portal'){
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
	$ID_PORTAL = $_POST['ID_PORTAL'];
	$PREFIXO_TABELA = $_POST['PREFIXO_TABELA'];
	$ST_TOKEN = $_POST['ST_TOKEN'];
	$USUARIO_ANALYTICS = $_POST['USUARIO_ANALYTICS'];
	$SENHA_ANALYTICS = $_POST['SENHA_ANALYTICS'];
	$NO_RESPONSAVEL = isset($_POST['NO_RESPONSAVEL']) ? $_POST['NO_RESPONSAVEL'] : "";
	$RESP_TELEFONE = isset($_POST['RESP_TELEFONE']) ? $_POST['RESP_TELEFONE'] : "";
	
	$sql = "UPDATE `dns`
			SET
				`no_dns` = '".$NO_DNS."',
				`no_site` = '".$NO_SITE."',
				`codigo_analytics` = '".$CODIGO_ANALYTICS."',
				`ip_html` = '".$IP_HTML."',
				`ip_banco` = '".$IP_BANCO."',
				`usuario_banco` = '".$USUARIO_BANCO."',
				`pwd_banco` = '".$PWD_BANCO."',
				`esquema_banco` = '".$ESQUEMA_BANCO."',
				`ds_website` = '".$DS_WEBSITE."',
				`tp_portal` = '".$TP_PORTAL."',
				`prefixo_tabela` = '".$PREFIXO_TABELA."',
				`st_token` = '".$ST_TOKEN."',
				`usuario_analytics` = '".$USUARIO_ANALYTICS."',
				`senha_analytics` = '".$SENHA_ANALYTICS."',
				`no_responsavel` = '".$NO_RESPONSAVEL."',
				`resp_telefone` = '".$RESP_TELEFONE."'
			WHERE `id` = ".$ID_PORTAL."";
			
	f_escrita($db, $sql);
	
	$var = Array(array(
		'resultado' => 0
	));
	echo json_encode($var);
	exit;
}

/* ########################### EDITAR ÓRGÃO ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'editar_orgao'){
	$NO_ORGAO = $_POST['NO_ORGAO'];
	$NO_SIGLA = $_POST['NO_SIGLA'];
	$TIPO     = $_POST['TIPO'];
	$STATUS   = $_POST['STATUS'];
	$ID_ORGAO = $_POST['ID_ORGAO'];
	
	$sql = "UPDATE `orgao`
			SET
				`no_orgao` = '".$NO_ORGAO."',
				`no_sigla` = '".$NO_SIGLA."',
				`tp_orgao` = '".$TIPO."',
				`status` = '".$STATUS."',
				`dt_atualizacao` = now()
			WHERE `id` = ".$ID_ORGAO."";
			
					
		f_escrita($db, $sql);
		
		$var = Array(array(
			'resultado' => 0
		));
		
		echo json_encode($var);
		exit;
}
/* ########################### EDITAR UNIDADE ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'editar_unidade'){
    $NO_UNIDADE = $_POST['NO_UNIDADE'];
	$NO_SIGLA = $_POST['NO_SIGLA'];
    $NO_ENDERECO = $_POST['NO_ENDERECO'];
    $NU_CEP = $_POST['NU_CEP'];
	$STATUS   = $_POST['STATUS'];
	$ID_ORGAO = $_POST['ID_ORGAO'];
    $ID_CIDADE = $_POST['ID_CIDADE'];
    $ID_UNIDADE = $_POST['ID_UNIDADE'];
	

	$sql = "UPDATE `unidade`
            SET
				`no_unidade` = '".$NO_UNIDADE."',
				`no_sigla` = '".$NO_SIGLA."',
                `no_endereco` = '".$NO_ENDERECO."',
                `nu_cep` = '".$NU_CEP."',
				`status` = '".$STATUS."',
                `orgao_id` = '".$ID_ORGAO."',
                `cidade_id` = '".$ID_CIDADE."',
				`dt_atualizacao` = now()
			WHERE `id` = ".$ID_UNIDADE."";
			
    /*$var = Array(array(
			'resultado' => $sql
		));
    echo json_encode($var);
    exit;*/
    
	f_escrita($db, $sql);
		
	$var = Array(array(
		'resultado' => 0
	));
    echo json_encode($var);
    exit;	
}
/* ########################### EDITAR RESPONSÁVEL ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'editar_responsavel'){
    $NO_RESPONSAVEL = $_POST['NO_RESPONSAVEL'];
	$NU_TELEFONE    = $_POST['NU_TELEFONE'];
    $NU_CELULAR     = $_POST['NU_CELULAR'];
    $NO_EMAIL       = $_POST['NO_EMAIL'];
	$STATUS         = $_POST['STATUS'];
    $DS_OBSERVACAO  = $_POST['DS_OBSERVACAO'];
	$ID_RESPONSAVEL = $_POST['ID_RESPONSAVEL'];
    $ID_ORGAO       = $_POST['ID_ORGAO'];
    $ID_UNIDADE     = $_POST['ID_UNIDADE'];
	

	$sql = "UPDATE `responsavel`
            SET
				`no_responsavel` = '".$NO_RESPONSAVEL."',
				`nu_telefone` = '".$NU_TELEFONE."',
                `nu_celular` = '".$NU_CELULAR."',
                `no_email` = '".$NO_EMAIL."',
                `ds_observacao` = '".$DS_OBSERVACAO."',
				`status` = '".$STATUS."',
                `orgao_id` = '".$ID_ORGAO."',
                `unidade_id` = '".$ID_UNIDADE."',
				`dt_atualizacao` = now()
			WHERE `id` = ".$ID_RESPONSAVEL."";
			
    /*$var = Array(array(
			'resultado' => $sql
		));
    echo json_encode($var);
    exit;*/
    
	f_escrita($db, $sql);
		
	$var = Array(array(
		'resultado' => 0
	));
    echo json_encode($var);
    exit;	
}
/* ########################### EDITAR ITEM DE CONFIGURAÇÃO ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'editar_itemdeconfiguracao'){
    $ID_ITEM         = $_POST['ID_ITEM'];
    $NO_ITEM         = $_POST['NO_ITEM'];
    $DS_CONFIGURACAO = $_POST['DS_CONFIGURACAO'];
	$ID_CATEGORIA = $_POST['ID_CATEGORIA'];
	$DS_DESCRICAO = $_POST['DS_DESCRICAO'];
	$STATUS       = $_POST['STATUS'];
	$NU_CUSTO     = $_POST['NU_CUSTO'];
	

	$sql = "UPDATE `itemdeconfiguracao`
            SET
				`no_item` = '".$NO_ITEM."',
				`ds_descricao` = '".$DS_DESCRICAO."',
                `categoriaitem_id` = '".$ID_CATEGORIA."',
				`status` = '".$STATUS."',
                `nu_custo_mensal` = '".$NU_CUSTO."',
                `ds_configuracao` = '".$DS_CONFIGURACAO."',
				`dt_atualizacao` = now()
			WHERE `id` = ".$ID_ITEM."";
			
    /*$var = Array(array(
			'resultado' => $sql
		));
    echo json_encode($var);
    exit;*/
    
	f_escrita($db, $sql);
		
	$var = Array(array(
		'resultado' => 0
	));
    echo json_encode($var);
    exit;	
}

/* ########################### EDITAR CHARGEBACK ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'editar_chargeback'){
    $ID         = $_POST['ID'];
    $NU_QTD     = $_POST['NU_QTD'];

	$sql = "UPDATE `chargeback`
            SET
				`nu_qtd` = '".$NU_QTD."',
				`dt_atualizacao` = now()
			WHERE `id` = ".$ID."";
			
    /*$var = Array(array(
			'resultado' => $sql
		));
    echo json_encode($var);
    exit;*/
    
	f_escrita($db, $sql);
		
	$var = Array(array(
		'resultado' => 0
	));
    echo json_encode($var);
    exit;	
}

/* ########################### EDITAR CIRCUITO MPLS ##########################################*/
if (isset($_POST['acao']) && $_POST['acao'] == 'editar_circuitompls'){
    $ID             = $_POST['ID'];
	$NU_LOTE        = $_POST['NU_LOTE'];
	$WAN_CLIENTE    = $_POST['WAN_CLIENTE'];
    $WAN_OPERADORA  = $_POST['WAN_OPERADORA'];
    $NU_MASCARA     = $_POST['NU_MASCARA'];
	$NU_IPLAN       = $_POST['NU_IPLAN'];
	$NO_DESIGNACAO  = $_POST['NO_DESIGNACAO'];
    $ID_RESPONSAVEL = $_POST['ID_RESPONSAVEL'];
    $ID_ITEM        = $_POST['ID_ITEM'];
    $NU_USUARIOS    = $_POST['NU_USUARIOS'];
    $DT_HOMOLOGACAO = $_POST['DT_HOMOLOGACAO'];
    $DT_INSTALACAO  = $_POST['DT_INSTALACAO'];
    $DS_OBSERVACAO  = $_POST['DS_OBSERVACAO'];
    $DS_FAIXA  = $_POST['DS_FAIXA'];
    $STATUS         = $_POST['status'];
    
    if($DT_HOMOLOGACAO!= ''){
		list($dia, $mes, $ano) = explode("/", $DT_HOMOLOGACAO);
		$DT_HOMOLOGACAO = $ano."-".$mes."-".$dia;
		//$DT_FIM = strtotime($DT_FIM);
	}
    if($DT_INSTALACAO!= ''){
		list($dia, $mes, $ano) = explode("/", $DT_INSTALACAO);
		$DT_INSTALACAO = $ano."-".$mes."-".$dia;
		//$DT_FIM = strtotime($DT_FIM);
	}

	$sql = "UPDATE `circuitompls`
            SET
				`nu_lote` = '".$NU_LOTE."',
                `ip_lan` = '".$NU_IPLAN."',
                `ip_mascara` = '".$NU_MASCARA."',
                `wan_cliente` = '".$WAN_CLIENTE."',
                `no_designacao` = '".$NO_DESIGNACAO."',
                `wan_operadora` = '".$WAN_OPERADORA."',
                `nu_usuarios` = '".$NU_USUARIOS."',
                `dt_homologacao` = '".$DT_HOMOLOGACAO."',
                `dt_instalacao` = '".$DT_INSTALACAO."',
                `ds_observacao` = '".$DS_OBSERVACAO."',
                `responsavel_id` = '".$ID_RESPONSAVEL."',
                `itemdeconfiguracao_id` = '".$ID_ITEM."',
                `status` = '".$STATUS."',
                `nu_dhcp` = '".$DS_FAIXA."',
				`dt_atualizacao` = now()
			WHERE `id` = ".$ID."";
	//echo $sql;
    //exit;
    /*$var = Array(array(
			'resultado' => $sql
		));
    echo json_encode($var);
    exit;*/
    
	f_escrita($db, $sql);
		
	$var = Array(array(
		'resultado' => 0
	));
    echo json_encode($var);
    exit;	
}
?>