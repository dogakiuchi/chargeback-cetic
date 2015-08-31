$(function(){
    var qt = 1;
    var ver_qt = 1;
    $("#mais_material").click(function(){
        
        var MATERIAIS = new Array(), hiddenidcategoria = $('.hiddenidcategoria').val();
        $("select[name='materiais[]']").each(function(){
            MATERIAIS.push($(this).val());
        });
        if (qt > 0 && ($(".materiais"+qt).val() == '' || $(".qtd"+qt).val() == '')) {
            alert('Selecione um item ou insira a quantidade referente ao item por favor.');
            return false;
        } else {
            //alert('Selecione um item ou insira a quantidade referente ao item por favor.');
            qt++;
            ver_qt = qt;
            $.ajax({
                //alert('Selecione um item ou insira a quantidade referente ao item por favor.');
                url: 'ajax/ajax_adiciona_itemconfiguracao.php',
                type: 'POST',
                data: {QTD: qt, MATERIAIS: MATERIAIS, hiddenidcategoria: hiddenidcategoria},
				dataType: 'json',
				success: function(data){
				    var resultado = data[0].resultado;
                    //alert(resultado);
				    var html = data[0].html;
				    if (resultado === '1'){
				    $(".form_material").append(html);
				        return false;
				    }
				    if (resultado === '0'){
				        alert('Não existem mais itens.');
				        return false;
				    }
				}
            });
        }
    });
    
    $('.form_material').on('click', '#b', function(e) {
        e.preventDefault();
        $(this).parent().remove();
        qt = qt - 1;
    });
});