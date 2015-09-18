$(function () {
    //alert("passou");
    var acao = null,
        usuarios = null,
        status = null;
    $("#nu_iplan").mask("099.099.099.099");
    $("#nu_mascara").mask("099.099.099.099");
    $("#wan_cliente").mask("099.099.099.099");
    $("#wan_operadora").mask("099.099.099.099");
    $( ".data_ui" ).datepicker({
	showOn: "button",
	buttonImage: "img/calendar.png",
	buttonImageOnly: true,
	dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior',
	changeMonth: true,
	changeYear: true
	});
    $("#salvar_circuitompls").click(function () {
		    //alert("passou");
        if ($("#nu_iplan").val() === "" || $("#nu_iplan").val() === null) {
            $("#div_iplan").addClass("error");
            $("#nu_iplan").addClass("inputError");
            return false;
        } else if ($("#acao").val() === "cadastrar") {
            acao = 'cadastrar_circuitompls';
					//alert("passou");
            if (document.getElementById("ativo").checked === true) {status = 1;} else { status = 0;}
            $.ajax({
                url: "ajax/ajax_cadastrar.php",
                type: 'POST',
                data: {
                    NU_LOTE: $("#nu_lote").val(),
				    NU_IPLAN: $("#nu_iplan").val(),
				    NU_MASCARA: $("#nu_mascara").val(),
				    WAN_CLIENTE: $("#wan_cliente").val(),
                    WAN_OPERADORA: $("#wan_operadora").val(),
				    NO_DESIGNACAO: $("#no_designacao").val(),
                    DS_OBSERVACAO: $("#ds_observacao").val(),
                    DS_FAIXA: $("#ds_faixa").val(),
				    ID_ORGAO: $("#no_orgao").val(),
                    ID_UNIDADE: $("#no_unidade").val(),
                    ID_RESPONSAVEL: $("#no_responsavel").val(),
                    ID_CATEGORIA: $(".hiddenidcategoria").val(),
                    ID_ITEM: $("#no_item").val(),
                    NU_USUARIOS: $("#nu_usuarios").val(),
                    DT_HOMOLOGACAO: $("#dt_homologacao").val(),
                    DT_INSTALACAO: $("#dt_instalacao").val(),
                    status: status,
				    acao: acao
				},
				dataType: 'json',
				success: function (data) {
				    var resultado = data[0].resultado;
							//$().toastmessage("showErrorToast", resultado);
				    if (resultado === 1) {
				        $().toastmessage("showErrorToast", "Erro! IP LAN já existe");
				        return false;
                    }
				    if (resultado === 0) {
				        $().toastmessage("showSuccessToast", "Cadastro efetuado!");
				        $("input").not("#salvar_circuitompls, #voltar").val("");
				    }
				}
            });
        } else {
            //alert("passou");
            acao = "editar_circuitompls";
            if (document.getElementById("ativo").checked === true) {status = 1;} else { status = 0;}
            $.ajax({
                url: 'ajax/ajax_editar.php',
				type: 'POST',
				data: {
                    NU_LOTE: $("#nu_lote").val(),
				    NU_IPLAN: $("#nu_iplan").val(),
				    NU_MASCARA: $("#nu_mascara").val(),
				    WAN_CLIENTE: $("#wan_cliente").val(),
                    WAN_OPERADORA: $("#wan_operadora").val(),
				    NO_DESIGNACAO: $("#no_designacao").val(),
                    ID_RESPONSAVEL: $("#no_responsavel").val(),
                    ID_ITEM: $("#no_item").val(),
                    NU_USUARIOS: $("#nu_usuarios").val(),
                    DT_HOMOLOGACAO: $("#dt_homologacao").val(),
                    DT_INSTALACAO: $("#dt_instalacao").val(),
                    DS_OBSERVACAO: $("#ds_observacao").val(),
                    DS_FAIXA: $("#ds_faixa").val(),
                    ID: $("#id").val(),
                    status: status,
				    acao: acao
				},
				dataType: 'json',
				success: function (data) {
				    var resultado = data[0].resultado;
                    //$().toastmessage("showErrorToast", resultado);
                    if (resultado == 1) {
				        $().toastmessage("showErrorToast", "Erro!");
				        return false;
                    }
				    if (resultado == 0)
                        $().toastmessage("showSuccessToast", "Circuito MPLS alterado!");
				}
            });
        }
    });
		
});