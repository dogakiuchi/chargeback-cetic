$(function(){
	$('#no_orgao').change(function(){
		if( $(this).val() ) {
			$('#no_unidade').hide();
			$('.carregando').show();
			$.getJSON('ajax/ajax_unidade.php?search=',{no_orgao: $(this).val(), ajax: 'true'}, function(j){
				var options = '';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].id + '">' + j[i].no_unidade + '</option>';
				}	
				$('#no_unidade').html(options);
				//$('.carregando').hide();
                $('#no_unidade').trigger("chosen:updated");
			});
		} else {
			$('#no_unidade').html('<option value="">-- Escolha uma Unidade --</option>');
		}
	});
});