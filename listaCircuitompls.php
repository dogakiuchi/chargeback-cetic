<?php
require ("menuInterno.php");
?>
<div id="centro">
    <div class="navbar">
        <div class="navbar-inner">
            <a href="cadastroCircuitompls.php" class="iframe brand" data-toggle="tooltip" title="Incluir Circuito">Circuitos MPLS <i class="icon-plus"></i></a>
    	</div>
    </div>
	<?php
        $sql = "SELECT c.*, o.no_sigla, i.no_item FROM circuitompls AS c
                INNER JOIN orgao AS o ON c.orgao_id = o.id
                INNER JOIN itemdeconfiguracao AS i ON c.itemdeconfiguracao_id = i.id";
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<h4 style="text-align:center;">Não existem circuitos cadastrados!</h4>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_colorbox"  class="table table-striped table-bordered">
            <thead>
                <th>Status</th>
                <th>Órgão</th>
                <th>Circuito</th>
                <th>IP LAN</th>
                <th>WAN Cliente</th>
                <th>Designação</th>
                <th>Utilização</th> 
                <th>Movimentação</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php 
                    foreach($res as $circuito) {
                ?>
                <tr class="over">
                    <td class="minhaTd"><?php if($circuito[13]==1){echo "Ativo";}else{echo "Inativo";} ?></td>
                    <td><?php echo $circuito[20]; ?></td>
                    <td><?php echo $circuito[21]; ?></td>
                    <td><?php echo $circuito[2]; ?></td>
                    <td><?php echo $circuito[4]; ?></td>
                    <td><?php echo $circuito[5]; ?></td>
                    <td class="minhaTd"><a href="#" class="iframe" data-toggle="tooltip" title="Editar Circuito"><i class="icon-tasks"></i></a></td>
                    <td class="minhaTd"><a href="#" class="iframe" data-toggle="tooltip" title="Editar Circuito"><i class="icon-retweet"></i></a></td>
                    <td class="minhaTd"><a href="editarCircuitompls.php?id=<?php echo $circuito[0]; ?>" class="iframe" data-toggle="tooltip" title="Editar Circuito"><i class="icon-edit"></i></a></td>
                    <td class="minhaTd"><a href="detalhaCircuitomplsTab1.php?id=<?php echo $circuito[0]; ?>" class="iframe" data-toggle="tooltip" title="Detalhar Circuito"><i class="icon-eye-open"></i></a></td>
                    <td class="minhaTd"><a href="ajax/ajax_excluir.php?id=<?php echo $circuito[0];?>&obj=6" data-toggle="tooltip" title="Excluir Circuito" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
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