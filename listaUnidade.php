<?php
require ("menuInterno.php");
$id_orgao = $_GET['idorgao'];
$sql1 = "SELECT no_orgao FROM orgao WHERE id=".$id_orgao;
$orgao = f_leitura_campo($db, $sql1);
?>
<div id="centro">
    <div class="navbar">
        <div class="navbar-inner">
            <a class="iframe brand" href="cadastroUnidade.php?id=<?php echo $id_orgao; ?>&org=<?php echo $orgao?>" data-toggle="tooltip" title="Incluir Unidade"><?php echo $orgao; ?> <i class="icon-plus"></i></a>
    	</div>
    </div>
	<?php
        $sql = "SELECT no_unidade, no_sigla, id
                FROM unidade
                WHERE orgao_id = ".$id_orgao."
                ORDER BY no_unidade";
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<h4 style="text-align:center;">Não existem unidades cadastradas!</h4>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_colorbox"   class="table table-striped table-bordered">
            <thead>
                <th>Unidade</th>
                <th>Sigla</th>
                <th>Responsáveis</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php 
                    foreach($res as $unidade) {
                ?>
                <tr>
                    <td><?php echo $unidade[0]; ?></td>
                    <td><?php echo $unidade[1]; ?></td>
                    <td class="minhaTd"><a href="listaResponsavel.php?idunidade=<?php echo $unidade[2]; ?>&idorgao=<?php echo $id_orgao;?>" data-toggle="tooltip" title="Visualizar Responsáveis"><i class="icon-user"></i></a></td>
                    <td class="minhaTd"><a href="editarUnidade.php?id=<?php echo $unidade[2]; ?>" class="iframe" data-toggle="tooltip" title="Editar Unidade"><i class="icon-edit"></i></a></td>
                    <td class="minhaTd"><a href="detalhaUnidade.php?id=<?php echo $unidade[2]; ?>" class="iframe" data-toggle="tooltip" title="Detalhar Unidade"><i class="icon-eye-open"></i></a></td>
                    <td class="minhaTd"><a href="ajax/ajax_excluir.php?id=<?php echo $unidade[2];?>&obj=2&idorgao=<?php echo $id_orgao;?>" data-toggle="tooltip" title="Excluir Unidade" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
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
        <a href="listaOrgao.php"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>