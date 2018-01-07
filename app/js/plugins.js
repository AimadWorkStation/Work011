
$(document).ready(function(){


	$('#search').keyup(function(){
		var str = $(this).val();
		if(str != ''){
			$.post('product.php',{str:str},function(data){
				$('#result').html(data);
			})
		}
		else{
			$('#result').html('');
		}
		
	})

	$('#search').focusin(
		function() {
			$("#result").show();			
		}
	);
	
	$('#search').focusout(
		function() {
			$("#result").hide();			
	});

});