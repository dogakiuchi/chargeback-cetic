$(function(){
	$('#no_unidade').change(function(){
        //alert("Teste");
		if( $(this).val()) {
			$.getJSON('ajax/ajax_responsavel.php',{no_unidade: $(this).val(), ajax: 'true'}, function(k){
				var options = '<option>SELECIONE UM RESPONSÁVEL</option>';
				for (var i = 0; i < k.length; i++) {
					options += '<option value="' + k[i].id + '">' + k[i].no_responsavel + '</option>';
				}
				$('#no_responsavel').html(options).show();
				//$('.carregando').hide();
                //$('#no_unidade').trigger("chosen:updated");
			});
		} else {
			$('#no_unidade').html('<option value="">-- SELECIONE UMA UNIDADE --</option>').show();
		}
	});
});