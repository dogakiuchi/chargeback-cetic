<?php
require ("menuInterno.php");
?>
<div id="centro">
    <?php
		$id_orgao = $_GET['idorgao'];
        $sql1 = "SELECT no_orgao FROM orgao WHERE id=".$id_orgao;
        $orgao = f_leitura_campo($db, $sql1);
    ?>
    <br/>
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#"><?php echo $orgao; ?></a>
            <a class="iframe" style="margin-left:350px" href="cadastroChargeback.php"><i class="btn btn-primary">Cadastro Chargeback</i></a>
    	</div>
    </div>
	<?php
        $sql2 = "SELECT no_unidade, id FROM unidade WHERE orgao_id = ".$id_orgao." ORDER BY no_unidade";
        $res1 = f_leitura($db, $sql2);
        $k=0;
        $i=0;
        while($k < count($res1)) {
        
    ?>
    <div class="navbar">
        <!--<div class="navbar-inner">-->
            <p class="subtitulo"><?php echo $res1[$k][0]; ?></p>
    	<!--</div>-->
    </div>
    <?php
        $sql3 = "SELECT c.*,  i.no_item FROM chargeback AS c
                 INNER JOIN itemdeconfiguracao AS i ON c.itemdeconfiguracao_id = i.id
                 WHERE c.orgao_id = ".$id_orgao." AND c.unidade_id =".$res1[$k][1];
        $res2 = f_leitura($db, $sql3);    
        if (empty($res2)) {
            echo '<br>';
            echo '<h4 style="text-align:center;">Não existem itens cadastrados!</h4>';
	   } else if (!empty($res2)){
    ?>
        <table  class="table table-striped table-bordered" width="100%">
            <thead>
                <th>Item de Configuração</th>
                <th>Quantidade</th>
                <th>Editar</th>
                <th>Excluir</th>
            </thead>
    <?php
            while($i < count($res2)) {
    ?>
            <tbody> <!-- <?php echo $i;?> -->
                <tr class="over">
                    <td><?php echo $res2[$i][8]; ?></td>
                    <td><?php echo $res2[$i][1]; ?></td>
                    <td style="text-align:center;"><a class="iframe" href="editarChargeback.php?id=<?php echo $res2[$i][0] ?>"><i class="icon-edit"></i></a></td>
                    <td style="text-align:center;"><a href="ajax/ajax_excluir.php?id=<?php echo $res2[$i][0] ?>&idorgao=<?php echo $id_orgao; ?>&obj=5" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
                </tr>
                <?php 
                    $i++;
                    }	//fecha foreach 
                ?>
            </tbody>
        </table>
    <?php
        }// fecha else if
        $k++;
        $i=0;
    }
    ?>
    
<div class="navbar" style="margin-top:20px;">
    <div class="navbar-inner" style="text-align:center;">
        <a href="listaChargeback.php"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>