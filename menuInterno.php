<!doctype html>
<html lang="pt-br">
<title>CeTIC</title>
<meta charset="utf-8" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js">
</script>
<![endif]-->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/chosen.css">
<link rel="stylesheet" href="css/estilo.css">
<link rel="stylesheet" href="plug-in/dataTable-1.10.0/media/css/jquery.dataTables.css">
<link rel="stylesheet" href="plug-in/dataTable-1.10.0/media/css/dataTable.tableTools.css">
<link rel="stylesheet" href="css/colorbox.css">
<script src="plug-in/dataTable-1.10.0/media/js/jquery.js"></script>
<script src="plug-in/dataTable-1.10.0/media/js/jquery.dataTables.js"></script>
<script src="plug-in/dataTable-1.10.0/media/js/dataTables.tableTools.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/colorbox.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
  require('banco/conecta.php');
?>
<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="#" style="margin-left:0"></a>
          <div class="nav-collapse collapse navbar-responsive-collapse">
            <ul class="nav ">
                <li><a href="listaChargeback.php">Início</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rede <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="listaCircuitompls.php">Link MPLS</a></li>
                    <li><a href="#">Link Fibra</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servidores <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Físicos</a></li>
                    <li><a href="listaServidorVM.php">VMs</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Web <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Sistemas</a></li>
                    <li><a href="index.php">Sites</a></li>
                  </ul>
                </li>
                <li><a href="#">Banco de Dados</a></li>
                <li><a href="#">Relatórios</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administração <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="listaOrgao.php">Órgãos/Unidades</a></li>
                    <li><a href="listaItemConfiguracao.php">Itens Configuração</a></li>
                  </ul>
                </li>
            </ul>
            <ul class="nav pull-right">
              <li class="divider-vertical"></li>               
                <div class="btn-group">
                  <a class="btn" href="#"><i class="icon-user"></i></a>
                  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-pencil"></i> Trocar Senha</a></li>
                      <li class="divider"></li>
                      <li><a href="#"><i class="i"></i> Sair</a></li>
                    </ul>
                </div>
            </ul>
            <p class="navbar-text pull-right">Conectado como: </p> 
          </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->