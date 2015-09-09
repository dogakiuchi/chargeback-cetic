$(function () {
    //alert("passou");
    var acao = null,
        qtd = new Array(),
        itens = new Array();
    $("#salvar_chargeback").click(function () {
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
                        alert("Item já cadastrado!");
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
            acao = "editar_chargeback";
            $.ajax({
                url: 'ajax/ajax_editar.php',
				type: 'POST',
				data: {
				    NU_QTD: $("#qtd").val(),
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
                        $().toastmessage("showSuccessToast", "Quantidade alterada!");
				}
            });
        }
    });
		
});