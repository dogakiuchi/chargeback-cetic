<?php
require ("menuInterno.php");
?>
<div id="centro">
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">Chargeback Consolidado</a>
            <a class="iframe" style="margin-left:600px" href="cadastroChargeback.php" ><i class="btn btn-primary">Cadastro Chargeback</i></a>
            <!--<a class="iframe" style="margin-left:600px"href="cadastroOrgao.php" style="text-decoration:none;"><i class="icon-file"></i></a>-->
        </div>
    </div>
    <?php
        $sql1 = "SELECT no_orgao, id FROM orgao ORDER BY no_orgao";
        $res1 = f_leitura($db, $sql1);

        if (empty($res1)) {
            echo '<br>';
            echo '<h3>Nenhum registro encontrado!</h3>';
        } else if (!empty($res1)){
    ?>

    <table id="tabela_colorbox"  class="table table-striped table-bordered" width="100%">
        <thead>
            <th>&Oacute;rg&atilde;o</th>
            <th>Custo Mensal</th>
            <th>Detalhar</th>
        </thead>
        <tfoot>
            <th>&Oacute;rg&atilde;o</th>
            <th>Custo Mensal</th>
            <th>Detalhar</th>
        </tfoot>
        <tbody>
        <?php 
            foreach($res1 as $orgao) {
                $sql2 = "SELECT itemdeconfiguracao_id, nu_qtd FROM chargeback WHERE orgao_id = ".$orgao[1];
                $res2 = f_leitura($db, $sql2);
                $custo_total = 0;
                if (!empty($res2)){
                    foreach($res2 as $item){
                        $sql3 = "SELECT nu_custo_mensal FROM itemdeconfiguracao WHERE id = ".$item[0];
                        $res3 = f_leitura($db, $sql3);
                        if (!empty($res3)){
                            foreach($res3 as $custo){
                                $custo_total += $custo[0] * $item[1];
                            }
                        }
                    }
                }                        
        ?>
        <tr class="over">
            <td><?php echo $orgao[0]; ?></td>
            <td><?php echo number_format($custo_total, 2, ',', '.'); ?></td>
            <td style="text-align:center;"><a href="detalhaChargeback.php?idorgao=<?php echo $orgao[1]; ?>" style="text-decoration:none;"><i class="icon-plus"></i></a></td>
        </tr>
        <?php
  
            }	//fecha foreach 
	   ?>
	   </tbody>
        <?php
        }// fecha else if
        ?>
    </table>
</div>
</body>
</html>