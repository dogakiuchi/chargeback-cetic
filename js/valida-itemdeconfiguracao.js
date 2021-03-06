$(function () {
    //alert("passou");
    var acao = null,
        status = null;
    $("#salvar_itemdeconfiguracao").click(function () {
		    //alert("passou");
        if ($("#no_item").val() === "" || $("#no_item").val() === null) {
            $("#div_nome").addClass("error");
            $("#no_item").addClass("inputError");
            return false;
        } else if ($("#acao").val() === "cadastrar") {
            acao = 'cadastrar_itemdeconfiguracao';
            if (document.getElementById("ativo").checked === true) {
                status = 1;
            } else {
                status = 0;
            }
					//alert("passou");
            $.ajax({
                url: "ajax/ajax_cadastrar.php",
                type: 'POST',
                data: {
                    NO_ITEM: $("#no_item").val(),
				    DS_DESCRICAO: $("#ds_descricao").val(),
                    DS_CONFIGURACAO: $("#ds_configuracao").val(),
				    NU_CUSTO: $("#nu_custo_mensal").val(),
				    STATUS: status,
				    ID_CATEGORIA: $("#no_categoria").val(),
				    acao: acao
				},
				dataType: 'json',
				success: function (data) {
				    var resultado = data[0].resultado;
                    //$().toastmessage("showErrorToast", resultado);
				    if (resultado === 1) {
				        $().toastmessage("showErrorToast", "Erro! Este item já existe");
				        return false;
                    }
				    if (resultado === 0) {
				        $().toastmessage("showSuccessToast", "Cadastro efetuado!");
                        document.form.reset();
				        $("input").not("#salvar_itemdeconfiguracao, #voltar").val("");
				    }
				}
            });
        } else {
            //alert("passou");
            acao = "editar_itemdeconfiguracao";
            if (document.getElementById("ativo").checked === true) {
                status = 1;
            } else {
                status = 0;
            }
            $.ajax({
                url: 'ajax/ajax_editar.php',
				type: 'POST',
				data: {
                    ID_ITEM: $("#id_item").val(),
				    NO_ITEM: $("#no_item").val(),
				    DS_DESCRICAO: $("#ds_descricao").val(),
                    DS_CONFIGURACAO: $("#ds_configuracao").val(),
				    NU_CUSTO: $("#nu_custo_mensal").val(),
				    STATUS: status,
				    ID_CATEGORIA: $("#no_categoria").val(),
				    acao: acao
				},
				dataType: 'json',
				success: function (data) {
				    var resultado = data[0].resultado;
                    
                   /* if (resultado === 1) {
				        $().toastmessage("showErrorToast", "Erro!");
				        return false;
                    }*/
				    if (resultado === 0) {
                        $().toastmessage("showSuccessToast", "Item de configuração alterado!");
                        document.form.reset();
                        $("input").not("#salvar_itemdeconfiguracao, #voltar").val("");
                    }
				}
            });
        }
    });
		
    ("input").change(function () {
        (".input").removeClass("error");
        ("input").removeClass("inputError");
    });
});