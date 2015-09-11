<?php
require ("menuInterno.php");
?>
<div id="centro">
    <?php
        $id_unidade = $_GET['idunidade'];
		$id_orgao   = $_GET['idorgao'];

        $sql1 = "SELECT no_orgao FROM orgao WHERE id=".$id_orgao;
        $orgao = f_leitura_campo($db, $sql1);

        $sql2 = "SELECT no_unidade FROM unidade WHERE id=".$id_unidade;
        $unidade = f_leitura_campo($db, $sql2);
	?>
    <br/>
    <table class="table table-striped table-bordered" >
        <tbody>
            <tr>
                <td style="font-weight:bold">Órgão</td>
                <td><?php echo $orgao; ?></td>
            </tr>
            <tr>
                <td style="font-weight:bold">Unidade</td>
                <td><?php echo $unidade; ?></td>
            </tr>
        </tbody>
    </table>
    <div class="navbar" style="margin-top:20px;">
        <div class="navbar-inner">
            <a class="brand" href="#">Responsáveis</a>
            <a class="iframe" style="margin-left:700px" href="cadastroResponsavel.php?idunidade=<?php echo $id_unidade; ?>&idorgao=<?php echo $id_orgao;?>" style="text-decoration:none;"><i class="btn btn-primary">Cadastrar</i></a>
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
        <table id="tabela_orgao"  class="table table-striped table-bordered" width="100%">
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
                    <td style="text-align:center;"><a class="iframe" href="editarResponsavel.php?id=<?php echo $resp[3]; ?>" style="text-decoration:none;"><i class="icon-edit"></i></a></td>
                    <td style="text-align:center;"><a class="iframe" href="detalhaResponsavel.php?id=<?php echo $resp[3]; ?>" style="text-decoration:none;"><i class="icon-eye-open"></i></a></td>
                    <td style="text-align:center;"><a href="ajax/ajax_excluir.php?id=<?php echo $resp[3];?>&obj=3&idorgao=<?php echo $id_orgao;?>&idunidade=<?php echo $id_unidade;?>" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a></td>
                </tr>
                <?php 
                    }	//fecha foreach 
                ?>
            </tbody>
    <?php
        }// fecha else if
    ?>
    </table>
<div class="navbar" style="margin-top:20px;">
    <div class="navbar-inner" style="text-align:center;">
        <a href="listaUnidade.php?idorgao=<?php echo $id_orgao;?>"><input type="button" value="VOLTAR" id="voltar" class="btn" onsubmit="return false;" /></a>
    </div>
</div>
</div>
</body>
</html>