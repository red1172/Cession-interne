$(document).ready(function(){
	$('#search').keyup(function(){
	
		var search=$(this).val();
		search=$.trim(search);
		if(search !=="")
		{
			$('#loader').show();
			
			$.post('post.php',{search:search},function(data){
			$('#resultat ul').html(data).show();
			$('#loader').hide();
				//clique su le lien
				$('a').click(function(){
					var lien=$(this).text();
					$('#loader').show();
					$('#search').attr('value',lien);
					$.post('post1.php',{lien:lien},function(data){
					$('#feedback').html(data);
				$('#loader').hide();
				$('#resultat ul').hide();	
					});
				});
			});
		}
		
	});
});