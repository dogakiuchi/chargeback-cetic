$(function () {
    //alert("passou");
    var acao = null,
        status = null;
    $("#nu_iplan").mask("099.099.099.099");
    $("#nu_mascara").mask("099.099.099.099");
    $("#nu_ipwan").mask("099.099.099.099");
    $("#salvar_circuitompls").click(function () {
		    //alert("passou");
        if ($("#nu_iplan").val() === "" || $("#nu_iplan").val() === null) {
            $("#div_iplan").addClass("error");
            $("#nu_iplan").addClass("inputError");
            return false;
        } else if ($("#acao").val() === "cadastrar") {
            acao = 'cadastrar_circuitompls';
					//alert("passou");
            $.ajax({
                url: "ajax/ajax_cadastrar.php",
                type: 'POST',
                data: {
                    NU_LOTE: $("#nu_lote").val(),
				    NU_IPLAN: $("#nu_iplan").val(),
				    NU_MASCARA: $("#nu_mascara").val(),
				    NU_IPWAN: $("#nu_ipwan").val(),
				    NO_DESIGNACAO: $("#no_designacao").val(),
				    ID_ORGAO: $("#no_orgao").val(),
                    ID_UNIDADE: $("#no_unidade").val(),
                    ID_RESPONSAVEL: $("#no_responsavel").val(),
                    ID_CATEGORIA: $(".hiddenidcategoria").val(),
                    ID_ITEM: $("#no_item").val(),
				    acao: acao
				},
				dataType: 'json',
				success: function (data) {
				    var resultado = data[0].resultado;
							//$().toastmessage("showErrorToast", resultado);
				    if (resultado === 1) {
				        $().toastmessage("showErrorToast", "Erro! Esta circuito já existe");
				        return false;
                    }
				    if (resultado === 0) {
				        $().toastmessage("showSuccessToast", "Cadastro efetuado!");
				        $("input").not("#salvar_circuitompls, #voltar").val("");
				    }
				}
            });
        } else {
            alert("passou");
            acao = "editar_circuitompls";
            $.ajax({
                url: 'ajax/ajax_editar.php',
				type: 'POST',
				data: {
                    NU_LOTE: $("#nu_lote").val(),
				    NU_IPLAN: $("#nu_iplan").val(),
				    NU_MASCARA: $("#nu_mascara").val(),
				    NU_IPWAN: $("#nu_ipwan").val(),
				    NO_DESIGNACAO: $("#no_designacao").val(),
                    ID_RESPONSAVEL: $("#no_responsavel").val(),
                    ID_ITEM: $("#no_item").val(),
                    ID: $("#id").val(),
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
		
    ("input").change(function () {
        (".input").removeClass("error");
        ("input").removeClass("inputError");
    });
});