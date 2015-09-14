<?php
require ("menuInterno.php");
?>
<div id="centro">
    <div class="navbar" >
        <div class="navbar-inner">
            <a class="iframe brand" href="cadastroOrgao.php" data-toggle="tooltip" title="Incluir Órgão">Órgãos da Administração Direta e Indireta <i class="icon-plus"></i></a>
        </div>
    </div>
    <?php
        $sql = "SELECT no_orgao, no_sigla, id
                FROM orgao
                ORDER BY no_orgao";
        $res = f_leitura($db, $sql);

        if (empty($res)) {
            echo '<br>';
            echo '<h3>Nenhum registro encontrado!</h3>';
        } else if (!empty($res)){
    ?>

    <table id="tabela_colorbox"  class="table table-striped table-bordered">
        <thead>
            <th>&Oacute;rg&atilde;o</th>
            <th>Sigla</th>
            <th>Unidades</th>
            <th>Editar</th>
            <th>Detalhar</th>
            <th>Excluir</th>
        </thead>
        <tfoot>
            <th>&Oacute;rg&atilde;o</th>
            <th>Sigla</th>
            <th>Unidades</th>
            <th>Editar</th>
            <th>Detalhar</th>
            <th>Excluir</th>
        </tfoot>
        <tbody>
        <?php 
            foreach($res as $orgao) {
        ?>
        <tr>
            <td><?php echo $orgao[0]; ?></td>
            <td><?php echo $orgao[1]; ?></td>
            <td class="minhaTd"><a href="listaUnidade.php?idorgao=<?php echo $orgao[2]; ?>" data-toggle="tooltip" title="Visualizar Unidades"><i class="icon-folder-open"></i></a></td>
            <td class="minhaTd"><a href="editarOrgao.php?id=<?php echo $orgao[2]; ?>" class="iframe" data-toggle="tooltip" title="Editar Órgão"><i class="icon-edit"></i></a></td>
            <td class="minhaTd"><a href="detalhaOrgao.php?id=<?php echo $orgao[2]; ?>"class="iframe" data-toggle="tooltip" title="Detalhar Órgão"><i class="icon-eye-open"></i></a></td>
            <td class="minhaTd">
				<a href="ajax/ajax_excluir.php?id=<?php echo $site[2];?>&obj=1" data-toggle="tooltip" title="Excluir Órgão" onClick="if(confirm('Confirma a exclusão?') == true){this.href;return true;}else{return false;}"><i class="icon-remove"></i></a>
			</td>
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