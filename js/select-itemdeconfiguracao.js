$(function(){
	$('#no_categoria').change(function(){
        //alert("Teste!");
		if( $(this).val()) {
            $('.hiddenidcategoria').val($(this).val());
			$.getJSON('ajax/ajax_itemdeconfiguracao.php?search=',{no_categoria: $(this).val(), ajax: 'true'}, function(k){
				var options = '<option>SELECIONE UM ITEM</option>';
				for (var i = 0; i < k.length; i++) {
					options += '<option value="' + k[i].id + '">' + k[i].no_item + '</option>';
				}
				$('#materiais').html(options).show();
				
			});
		} else {
			$('#no_categoria').html('<option value="">-- SELECIONE UMA CATEGORIA --</option>').show();
		}
	});
});