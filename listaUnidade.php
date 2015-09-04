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
            <a class="iframe" style="margin-left:600px" href="cadastroUnidade.php?id=<?php echo $id_orgao; ?>&org=<?php echo $orgao?>" style="text-decoration:none;"><i class="btn btn-primary">Cadastro de Unidade</i></a>
    	</div>
    </div>
	<?php
        $sql = "SELECT no_unidade, no_sigla, id
                FROM unidade
                WHERE orgao_id = ".$id_orgao."
                ORDER BY no_unidade";
        $res = f_leitura($db, $sql);
        if (empty($res)) {
            echo '<br>';
            echo '<h4 style="text-align:center;">Não existem unidades cadastradas!</h4>';
	   } else if (!empty($res)){
	?>
        <table id="tabela_orgao"  class="table table-striped table-bordered" width="100%">
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
                    $count=0;
                    foreach($res as $unidade) {
                ?>
                <tr class="over" <?php if ($count==1):?> id="zebra"<?php endif;?>>
                    <td><?php echo $unidade[0]; ?></td>
                    <td><?php echo $unidade[1]; ?></td>
                    <td style="text-align:center;"><a href="listaResponsavel.php?idunidade=<?php echo $unidade[2]; ?>&idorgao=<?php echo $id_orgao;?>" style="text-decoration:none;"><i class="icon-user"></i></a></td>
                    <td style="text-align:center;"><a class="iframe" href="editarUnidade.php?id=<?php echo $unidade[2]; ?>" style="text-decoration:none;"><i class="icon-edit"></i></a></td>
                    <td style="text-align:center;"><a class="iframe" href="detalhaUnidade.php?id=<?php echo $unidade[2]; ?>" style="text-decoration:none;"><i class="icon-eye-open"></i></a></td>
                    <td style="text-align:center;"><a href="ajax/ajax_excluir.php?id=<?php echo $unidade[2];?>&obj=2&idorgao=<?php echo $id_orgao;?>" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
                </tr>
                <?php 
                        if ($count==1){
                            $count=0;
                        }
                        else {
                            $count++;
                        }
  
                    }	//fecha foreach 
                ?>
            </tbody>
    <?php
        }// fecha else if
    ?>
    </table>
<div class="navbar" style="margin-top:20px;">
    <div class="navbar-inner" style="text-align:center;">
        <a href="listaOrgao.php"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>