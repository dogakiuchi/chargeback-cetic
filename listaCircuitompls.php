<?php
require ("menuInterno.php");
?>
<div id="centro">
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="#">Circuitos MPLS</a>
            <a class="iframe" style="margin-left:700px" href="cadastroCircuitompls.php" style="text-decoration:none;"><i class="btn btn-primary">Cadastrar</i></a>
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
        <table id="tabela_colorbox"  class="table table-striped table-bordered" width="100%">
            <thead>
                <th>Lote</th>
                <th>Órgão</th>
                <th>Circuito</th>
                <th>IP LAN</th>
                <th>Máscara</th>
                <th>IP WAN</th>
                <th>Designação</th>
                <th>Editar</th>
                <th>Detalhar</th>
                <th>Excluir</th>
            </thead>
            <tbody>
                <?php 
                    foreach($res as $circuito) {
                ?>
                <tr class="over">
                    <td><?php echo $circuito[1]; ?></td>
                    <td><?php echo $circuito[13]; ?></td>
                    <td><?php echo $circuito[14]; ?></td>
                    <td><?php echo $circuito[2]; ?></td>
                    <td><?php echo $circuito[3]; ?></td>
                    <td><?php echo $circuito[4]; ?></td>
                    <td><?php echo $circuito[5]; ?></td>
                    <td class="minhaTd"><a class="iframe" href="editarCircuitompls.php?id=<?php echo $circuito[0]; ?>"><i class="icon-edit"></i></a></td>
                    <td class="minhaTd"><a class="iframe" href="detalhaCircuitompls.php?id=<?php echo $circuito[0]; ?>"><i class="icon-eye-open"></i></a></td>
                    <td class="minhaTd"><a href="ajax/ajax_excluir.php?id=<?php echo $circuito[0];?>&obj=6" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
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