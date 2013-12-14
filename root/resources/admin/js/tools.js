//////////////////////////////////////////////////
/* Utilitaire for Beta-Gallery of betalife        */
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




function deleteItem(id,thumb)
{
	$('#deleteItem .modal-body').html(
			'<p><img src="../uploads/thumbs/'+thumb+'"></p>'
			+'<p>Would you like to delete this photo ?<br><b><small>'+thumb+'</small></b></p>'
	);
	$('#deleteItem').modal({})
}

function doDelete($id)
{
	$.post("/gallery/deleteItem",
			   { id: $id  },
			   function(data){
			     alert("Data Loaded: " +  data);
			   }
			 );
}