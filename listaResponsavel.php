<?php
require ("menuInterno.php");
        
$id_unidade = $_GET['idunidade'];
$id_orgao   = $_GET['idorgao'];

$sql1 = "SELECT o.no_orgao, u.no_unidade FROM unidade AS u INNER JOIN orgao AS o ON o.id = u.orgao_id WHERE u.id=".$id_unidade;
$orgaounidade = f_leitura($db, $sql1);

?>
<div id="centro">
    <table class="table table-striped table-bordered" >
        <tbody>
            <tr>
                <td class="minhaTd">Órgão</td>
                <td><?php echo $orgaounidade[0][0]; ?></td>
            </tr>
            <tr>
                <td class="minhaTd">Unidade</td>
                <td><?php echo $orgaounidade[0][1]; ?></td>
            </tr>
        </tbody>
    </table>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="iframe brand" href="cadastroResponsavel.php?idunidade=<?php echo $id_unidade; ?>&idorgao=<?php echo $id_orgao;?>" data-toggle="tooltip" title="Incluir Responsável">Responsáveis <i class="icon-plus"></i></a>
    	</div>
    </div>
	<?php
        $sql = "SELECT no_responsavel, nu_telefone, no_email, id, nu_celular
                FROM responsavel
                WHERE orgao_id = ".$id_orgao." AND unidade_id = ".$id_unidade."
                ORDER BY no_responsavel";
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<h4 style="text-align:center;">Não existe responsável cadastrado!</h4>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_orgao"  class="table table-striped table-bordered">
            <thead>
                <th>Nome</th>
                <th>Tel. Fixo</th>
                <th>Tel. Celular</th>
                <th>E-mail</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php 
                    foreach($res as $resp) {
                ?>
                <tr class="over">
                    <td><?php echo $resp[0]; ?></td>
                    <td><?php echo $resp[1]; ?></td>
                    <td><?php echo $resp[4]; ?></td>
                    <td><?php echo $resp[2]; ?></td>
                    <td class="minhaTd"><a href="editarResponsavel.php?id=<?php echo $resp[3];?>" class="iframe" data-toggle="tooltip" title="Editar Responsável"><i class="icon-edit"></i></a></td>
                    <td class="minhaTd"><a href="detalhaResponsavel.php?id=<?php echo $resp[3];?>" class="iframe" data-toggle="tooltip" title="Detalhar Responsável"><i class="icon-eye-open"></i></a></td>
                    <td class="minhaTd"><a href="ajax/ajax_excluir.php?id=<?php echo $resp[3];?>&obj=3&idorgao=<?php echo $id_orgao;?>&idunidade=<?php echo $id_unidade;?>" data-toggle="tooltip" title="Excluir Responsável" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
                </tr>
                <?php 
                    }	//fecha foreach 
                ?>
            </tbody>
    <?php
        }// fecha else if
    ?>
    </table>
<div class="navbar">
    <div class="navbar-inner menuInferior">
        <a href="listaUnidade.php?idorgao=<?php echo $id_orgao;?>"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>