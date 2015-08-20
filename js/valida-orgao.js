$(function () {
		$("#salvar_orgao").click(function() {
			if ($("#no_orgao").val()=="" || $("#no_orgao").val()==null){
				$("#div_nome").addClass("error");
				$("#no_orgao").addClass("inputError");
				return false;	
			} else if ($("#no_sigla").val()=="" || $("#no_sigla").val()==null){
					$("#div_sigla").addClass("error");
					$("#no_sigla").addClass("inputError");
					return false;		
			} else if ($("#acao").val()=="cadastrar") {	
					var acao = 'cadastrar_orgao';
					var tipo = "";
					var status = "";
					if (document.getElementById("tp_direta").checked == true) {
						tipo = 0;
                    } else {
						tipo = 1;
                    }
					if (document.getElementById("ativo").checked == true) {
						status = 1;
                    } else {
						status = 0;
                    }
					$.ajax({
						url: "ajax/ajax_cadastrar.php",
						type: 'POST',
						data: {
							NO_ORGAO: $("#no_orgao").val(),
							NO_SIGLA: $("#no_sigla").val(),
							TIPO: tipo,
							STATUS: status,
							acao: acao
						},
						dataType: 'json',
						success: function(data){
							var resultado = data[0].resultado;
							if (resultado == 1){
								$().toastmessage("showErrorToast", "Erro! Este órgão já existe");
								return false;	
							}
							
							if (resultado == 0){
								$().toastmessage("showSuccessToast", "Cadastro efetuado!");	
								$("input").not("#salvar_orgao, #voltar").val("");
							}
						}
					});
			}else {
				var acao = "editar_orgao";	
				var tipo = "";
				var status = "";
					if (document.getElementById("tp_direta").checked == true)
						tipo = 0;
					else 
						tipo = 1;
						
					if (document.getElementById("ativo").checked == true)
						status = 1;
					else 
						status = 0;
						
				$.ajax({
					url: 'ajax/ajax_editar.php',
					type: 'POST',
					data: {
						NO_ORGAO: $("#no_orgao").val(),
						NO_SIGLA: $("#no_sigla").val(),
						ID_ORGAO: $("#id_orgao").val(),
						TIPO: tipo,
						STATUS: status,
						acao: acao	
					},
					dataType: 'json',
					success: function(data){
						var resultado = data[0].resultado;
						if (resultado===0)
							$().toastmessage("showSuccessToast","Órgão alterado!");	
					}
				});
			}
		});
		
		$("input").change(function(){
			$(".input").removeClass("error");
			$("input").removeClass("inputError");
		});

	});