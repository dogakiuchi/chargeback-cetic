$(function () {
    //alert("passou");
    var acao = null,
        qtd = new Array(),
        itens = new Array();
    $("#salvar_chargeback").click(function () {
		    //alert("passou");
        if ($("#nu_qtd").val() === "" || $("#nu_qtd").val() === null) {
            $("#div_qtd").addClass("error");
            $("#nu_qtd").addClass("inputError");
            return false;
        } else if ($("#acao").val() === "cadastrar") {
            acao = 'cadastrar_chargeback';
            $("select[name='materiais[]']").each(function(){
                itens.push($(this).val());
            });
            $("input[name='quantidades[]']").each(function(){
                qtd.push($(this).val());
            });
            //alert("passou");
            $.ajax({
                url: "ajax/ajax_cadastrar.php",
                type: 'POST',
                data: {
                    NU_QTD: qtd,
				    ID_ORGAO: $("#no_orgao").val(),
				    ID_UNIDADE: $("#no_unidade").val(),
				    ID_ITEM: itens,
				    ID_CATEGORIA: $("#no_categoria").val(),
				    acao: acao
				},
				dataType: 'json',
				success: function (data) {
				    var resultado = data[0].resultado;
				    //alert(resultado);
				    if (resultado === 1) {
				        //$().toastmessage("showErrorToast", "Erro!");
				        return false;
                    }
				    if (resultado === 0) {
                        alert("Cadastro efetuado!");
				        //$().toastmessage("showSuccessToast", "Cadastro efetuado!");
				        $('#charge').each (function(){
                            this.reset();
                        });
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