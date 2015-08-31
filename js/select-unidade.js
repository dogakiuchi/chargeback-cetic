/*$function () {
   $("#no_orgao").change(function(){
       alert("teste");
      $.ajax({
         type: 'POST',
         url: "ajax/ajax_unidade.php",
         data: {no_orgao: $("#no_orgao").val()},
         dataType: 'json',
         success: function(json){
            var options = "";
            $.each(json, function(key, value){
               options += '<option value="' + key + '">' + value + '</option>';
            });
            $("#no_unidade").html(options).show();
         }
      });
   });
});*/

$(function(){
	$('#no_orgao').change(function(){
		if( $(this).val()) {
			$.getJSON('ajax/ajax_unidade.php?search=',{no_orgao: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option>SELECIONE UMA UNIDADE</option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].id + '">' + j[i].no_unidade + '</option>';
				}
				$('#no_unidade').html(options).show();
				//$('.carregando').hide();
                //$('#no_unidade').trigger("chosen:updated");
			});
		} else {
			$('#no_orgao').html('<option value="">-- SELECIONE UM ÓRGÃO --</option>').show();
		}
	});
});

/*$(function(){
	$('#no_orgao').change(function(){
        var orgao = $('#no_orgao').val();
        $('#no_unidade').hide();
        //alert("passou!");
        $.getJSON('ajax/ajax_unidade.php?no_orgao='+orgao, function(dados){
            alert(dados.length);
            if(dados.length){
                alert(dados.length);
				var options = '';
                //alert("passou!");
                $.each(dados, function(i, obj){
				  options += '<option value="'+obj.id+'">'+obj.no_unidade+'</option>';
			     });
                $('#no_unidade').html(options).show();
            } else {
                alert("passou!");
				$('#no_unidade').html('<option value="">-- Escolha uma Unidade --</option>').show();
            }
            
			});
		});
});*/
