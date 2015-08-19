$(document).ready(function (){
				$(".iframe").colorbox({
					iframe: true,
					width: "880px",
					height: "90%",
					onClosed: function(){
						location.reload();	
					}
				});
				
				var TabelaRelatorio = $('#tabela_colorbox').dataTable({
					"dom": "<'row-fluid'<'span3'l><'span4'T><'span5'f>r>t<'row-fluid'<'span5'i><'span6'p>>",
					"tableTools": {"aButtons": [ "copy", "print", "xls", 
						{
							"sSwfPath": "media/swf/copy_csv_xls_pdf.swf"
						},
						{
							"sExtends": "pdf",
							"sPdfOrientation": "landscape",
							"sTitle": "Sistema de Controle de Protocolo",
							"sFileName": "Administrador_010714020756.pdf",
							"sPdfMessage": "Impressão de relatório de sites",
						}]
					},
					"language": {
					"emptyTable":     "Nenhum dado encontrado",
					"info":           "Mostrando _START_ até _END_ de _TOTAL_",
					"infoEmpty":      "Mostrando 0 de 0 de 0 entries",
					"infoFiltered":   "(filtered from _MAX_ total entries)",
					"infoPostFix":    "",
					"thousands":      ",",
					"lengthMenu":     "Mostrar _MENU_",
					"loadingRecords": "Carregando...",
					"processing":     "Processando...",
					"search":         "Procurar:",
					"zeroRecords":    "Nenhum registro encontrado",
					"paginate": {
						"first":      "Primeira",
						"last":       "Última",
						"next":       "Próxima",
						"previous":   "Anterior"
					},
					"aria": {
						"sortAscending":  ": activate to sort column ascending",
						"sortDescending": ": activate to sort column descending"
					}
					},
					"pagingType":"full_numbers",
					"searching": true
					
				} );
				$("#Refresh").click(function (e) {
            TabelaRelatorio.fnDraw();
        	});
			$("select[name='tabela_portais_length']").css({width: '60px'});    
		});