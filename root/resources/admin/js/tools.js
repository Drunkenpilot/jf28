//////////////////////////////////////////////////
/* Utilitaire for Beta Resto of betalife        */
/* Authority: Hao Zhenyu | Beta Life @ Brussels */
/* Year 2013                                    */
//////////////////////////////////////////////////

$(function(){
	
		if($('.alert-error').text() == ''){
			$('.alert-error').css('display','none');	
		} 
		if($('.alert-success').text() == ''){
			$('.alert-success').css('display','none');	
		} 
		if($('.alert-info').text() == ''){
			$('.alert-info').css('display','none');	
		} 
		
		$('input, textarea').placeholder();
	
		
		
})



function position_up(id){
	$('#position_up_'+id).submit();
}
function position_down(id){
	$('#position_down_'+id).submit();
}


function print() {

	
	if (confirm('vous voulez imprimer ce ticket ?')) {
		
		$('form[name=printTicket]').trigger('submit');
		
	}
}	

