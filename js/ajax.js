String.prototype.stripHTML = function() {return this.replace(/<.*?>/g, '');}// FUNCAO QUE RETIRA HTML DE VARIAVEL JAVASCRIPT

// BUSCA NOME DO ORGAO ######################################
$(document).ready(function(){
		$('#N_NUMERO_PROCESSO').attr("disabled", "disabled");
		$('#N_NUMERO_PROCESSO').css("background-color", "#cccccc");
		$('#N_ANO').attr("disabled", "disabled");
		$('#N_ANO').css("background-color", "#cccccc");	
     $("#NU_ORGAO").change(function(){
         var acao = "busca_nome_orgao";
		 var NU_ORGAO = $("input[name=NU_ORGAO]").val();
        $.ajax({
            type: "POST",
            data: { NU_ORGAO:NU_ORGAO,acao:acao},
            url: "../ajax.php",
            dataType: "html",
			 beforeSend: function(){
                $('#loading').css({display:"block"});
				$('#overlay_loading').css({display:"block"});
            },
            complete: function(msg){
                $('#loading').css({display:"none"});
				$('#overlay_loading').css({display:"none"});
				
            },
            success: function(result){
				if(result==0){	
					alert ("ORGÃO NÃO CADASTRADO");
					$('#N_NUMERO_PROCESSO').attr("disabled", "disabled");
					$('#N_NUMERO_PROCESSO').css("background-color", "#cccccc");
					$('#N_ANO').attr("disabled", "disabled");
					$('#N_ANO').css("background-color", "#cccccc");
					$("#N_NUMERO_PROCESSO").attr("value", '');
					$("input[name=NU_ORGAO]").attr("value", '');
					$('input[name=NU_ORGAO]').focus();
					location.reload();  
				}else{
					$("#N_NOMEUAG").attr("value", result);
					$('#N_NUMERO_PROCESSO').removeAttr("disabled");
					$('#N_NUMERO_PROCESSO').css("background-color", "#FFF");
					$('#N_NUMERO_PROCESSO').focus();
				}

            }           
        });
    });
	$("#N_NUMERO_PROCESSO").change(function(){
		$('#N_ANO').removeAttr("disabled");
		$('#N_ANO').css("background-color", "#FFF");
		$('#N_ANO').focus();
	});

	
 });
// FIM BUSCA NOME DO ORGAO ######################################
// BUSCA PROCESSO ###############################################
$(document).ready(function(){
	$("#N_ANO").change(function(){
	
		var NU_ORGAO = $("#NU_ORGAO").val();
		var N_NUMERO_PROCESSO = $("#N_NUMERO_PROCESSO").val();
		var N_ANO = $("#N_ANO").val();
		var acao = "busca_processo";
        $.ajax({
			data: {NU_ORGAO:NU_ORGAO,N_NUMERO_PROCESSO:N_NUMERO_PROCESSO,N_ANO:N_ANO,acao:acao},
			type: "POST",
      		url: "../ajax.php",
            dataType: "json",
            success : function(data){
				var resultado = data[0].resultado;
				if(resultado==0){
					$('#loading').css({display:"none"});
					$('#overlay_loading').css({display:"none"});
					alert ("PROCESSO NÃO ENCONTRADO"); 
					
					// PERGUNTA SE DESEJA NOVO PROCESSO
					novoprocesso = confirm("DESEJA CRIAR UM NOVO PROCESSO?");
						if (novoprocesso){
							// ABRE CRIACAO PROCESSO
							data = new Date();
							dia = data.getDate();
							if(dia<10){
								Ndia = "0"+dia;
							}
							mes = data.getMonth()+1;
							if(mes<10){
								Nmes = "0"+mes;
							}
							ano = data.getFullYear();
							var DATAATUAL = Ndia+"/"+Nmes+"/"+ano;
							$('.bloco_prc2').fadeOut();
							$("#PRC_DATA").attr("value", DATAATUAL);
						} else {
							// CANCELA CRIACAO PROCESSO
							alert ("Você clicou no botão CANCELAR,\n"+
									   "porque foi retornado o valor: "+decisao);
						}
		
					/*location.reload();     	*/	 		
				}else{
					
					// variaveis recebidas
					var prc_codigo = data[0].prc_codigo;
					var prc_data = data[0].prc_data;
					var prc_codigoexterno = data[0].prc_codigoexterno;
					var ass_descricao = data[0].ass_descricao;
					var int_nome = data[0].int_nome;
					var int_cgccpf = data[0].int_cgccpf;
					var prc_assuntosec = data[0].prc_assuntosec;
					var div_descricao = data[0].div_descricao;
					var org_descricao = data[0].org_descricao;
					var usr_nome = data[0].usr_nome;
					var trt_data = data[0].trt_data;
					var trt_hora = data[0].trt_hora;
					var trt_prazo = data[0].trt_prazo;
					var trt_prazo_hora = data[0].trt_prazo_hora;
					var trt_matricula = data[0].trt_matricula;
					var trt_observacao = data[0].trt_observacao;
					var trt_usr_nome = data[0].trt_usr_nome;
					
					 // coloco nos inputs 
					$("#PRC_CODIGO").attr("value", prc_codigo);            
					$("#PRC_DATA").attr("value", prc_data);
					$("#PRC_CODIGOEXTERNO").attr("value", prc_codigoexterno);
					$("#ASS_DESCRICAO").attr("value", ass_descricao);
					$("#INT_NOME").attr("value", int_nome);
					$("#PRC_ASSUNTOSEC").val(prc_assuntosec);
					$("#ORG_DESCRICAO").attr("value", org_descricao);
					$("#DIV_DESCRICAO").attr("value", div_descricao);
					$("#USR_NOME").attr("value", usr_nome);
					$("#TRT_DATA").attr("value", trt_data);
					$("#TRT_HORA").attr("value", trt_hora);
					$("#TRT_PRAZO").attr("value", trt_prazo);
					$("#TRT_PRAZO_HORA").attr("value", trt_prazo_hora);
					$("#TRT_MATRICULA").attr("value", trt_matricula);
					$("#TRT_OBSERVACAO").val(trt_observacao);
					$("#INT_CGCCPF").val(int_cgccpf);
					$("#TRT_USR_NOME").val(org_descricao+" - "+trt_usr_nome);
				}
        	},
			// Enquanto carrega habilito o loading
            beforeSend: function(){
                $('#loading').css({display:"block"});
				$('#overlay_loading').css({display:"block"});
            },
			// Depois que carrega desabilito o loading
            complete: function(msg){
                $('#loading').css({display:"none"});
				$('#overlay_loading').css({display:"none"});
            }
        });
         
    });
});

// FIM BUSCA PROCESSO ###############################################	
// BUSCA INTERESSADO ###############################################	

		jQuery(document).ready(function(){
			$('#INT_NOME').autocomplete({
				source:'../ajax.php?acao=int',
				width: 384,
				select:function(evt, ui)
				{
					this.form.INT_CODIGO.value = ui.item.codigo;
				}
			});
		});
 		jQuery(document).ready(function($) {
			 // Chamada da funcao upperText(); ao carregar a pagina
				 upperText();
				 // Funcao que faz o texto ficar em uppercase
				 function upperText() {
				// Para tratar o colar
				 $("#INT_NOME").bind('paste', function(e) {
				 var el = $(this);
				 setTimeout(function() {
				 var text = $(el).val();
				 el.val(text.toUpperCase());
				 }, 100);
				 });
				 
				// Para tratar quando é digitado
				 $("#INT_NOME").keypress(function() {
				 var el = $(this);
				 setTimeout(function() {
				 var text = $(el).val();
				 el.val(text.toUpperCase());
				 }, 100);
				 });
				 }
			 });
// FIM BUSCA INTERESSADO ###############################################
// AVISO INTERESSADO NÃO EXISTE ########################################
$(document).ready(function(){
	 $("#INT_NOME").bind(function(){
		 alert('teste');
	 });
});
// FIM AVISO INTERESSADO NÃO EXISTE ####################################