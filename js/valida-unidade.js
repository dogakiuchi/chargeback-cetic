$(function () {
    //alert("passou");
    var acao = null,
        status = null;
    $("#salvar_unidade").click(function () {
		    //alert("passou");
        if ($("#no_unidade").val() === "" || $("#no_unidade").val() === null) {
            $("#div_nome").addClass("error");
            $("#no_unidade").addClass("inputError");
            return false;
        } else if ($("#acao").val() === "cadastrar") {
            acao = 'cadastrar_unidade';
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
                    NO_UNIDADE: $("#no_unidade").val(),
				    NO_SIGLA: $("#no_sigla").val(),
				    NO_ENDERECO: $("#no_endereco").val(),
				    ID_CIDADE: $("#no_cidade").val(),
				    NU_CEP: $("#nu_cep").val(),
				    STATUS: status,
				    ID_ORGAO: $("#id_orgao").val(),
				    acao: acao
				},
				dataType: 'json',
				success: function (data) {
				    var resultado = data[0].resultado;
							//$().toastmessage("showErrorToast", resultado);
				    if (resultado === 1) {
				        $().toastmessage("showErrorToast", "Erro! Esta unidade já existe");
				        return false;
                    }
				    if (resultado === 0) {
				        $().toastmessage("showSuccessToast", "Cadastro efetuado!");
				        $("input").not("#salvar_unidade, #voltar").val("");
				    }
				}
            });
        } else {
            //alert("passou");
            acao = "editar_unidade";
            if (document.getElementById("ativo").checked === true) {
                status = 1;
            } else {
                status = 0;
            }
            $.ajax({
                url: 'ajax/ajax_editar.php',
				type: 'POST',
				data: {
				    NO_SIGLA: $("#no_sigla").val(),
                    NO_UNIDADE: $("#no_unidade").val(),
                    ID_UNIDADE: $("#id_unidade").val(),
				    ID_ORGAO: $("#no_orgao").val(),
                    NO_ENDERECO: $("#no_endereco").val(),
                    NU_CEP: $("#nu_cep").val(),
                    ID_CIDADE: $("#no_cidade").val(),
				    STATUS: status,
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
                        $().toastmessage("showSuccessToast", "Unidade alterada!");
				}
            });
        }
    });
		
    ("input").change(function () {
        (".input").removeClass("error");
        ("input").removeClass("inputError");
    });
});