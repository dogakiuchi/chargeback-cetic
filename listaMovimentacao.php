<?php
require ("menuInterno.php");
$ID = $_GET['id'];
?>
<div id="centro">
    <div class="navbar">
        <div class="navbar-inner">
            <a href="movimentarCircuitompls.php?id=<?php echo $ID; ?>" class="iframe brand" data-toggle="tooltip" title="Movimentar Circuito">Movimentações <i class="icon-plus"></i></a>
    	</div>
    </div>
	<?php
        $sql = "SELECT m.*, u.no_unidade, i.no_item FROM movimentacaocircuito AS m
                INNER JOIN unidade AS u ON m.unidade_id = u.id
                INNER JOIN itemdeconfiguracao AS i ON m.itemdeconfiguracao_id = i.id
                WHERE m.circuitompls_id =".$ID;
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<h4 style="text-align:center;">Não existem movimentações cadastradas!</h4>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_colorbox"  class="table table-striped table-bordered">
            <thead>
                <th>Data do Cadastro</th>
                <th>Unidade Anterior</th>
                <th>Circuito Anterior</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php 
                    foreach($res as $circuito) {
                ?>
                <tr class="over">
                    <td><?php echo $circuito[10]; ?></td>
                    <td><?php echo $circuito[15]; ?></td>
                    <td><?php echo $circuito[16]; ?></td>
                    <td class="minhaTd"><!--<a href="editarMovimentacao.php?id=<?php //echo $circuito[0]; ?>" class="iframe" data-toggle="tooltip" title="Editar Circuito">--><i class="icon-edit"></i></a></td>
                    <td class="minhaTd"><a href="detalhaMovimentacao.php?id=<?php echo $circuito[0]; ?>" class="iframe" data-toggle="tooltip" title="Detalhar Circuito"><i class="icon-eye-open"></i></a></td>
                    <td class="minhaTd"><a href="ajax/ajax_excluir.php?id=<?php echo $circuito[0];?>&obj=7&idcircuito=<?php echo $ID;?>" data-toggle="tooltip" title="Excluir Movimentação" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
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
        <a href="listaCircuitompls.php"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>