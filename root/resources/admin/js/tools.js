//////////////////////////////////////////////////
/* Utilitaire for Beta-Gallery of betalife      */
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
		
		/* masonry*/
		 var $container = $('.row');

		    $container.imagesLoaded(function () {
		        $container.masonry({
		            itemSelector: '.post-box',
		            columnWidth: '.post-box',
		            transitionDuration: 0
		        });
		    });
		   
		/* end of masonry */
		    
		/* date picker */
		 $('#year').datepicker({
				 
				 format: " yyyy",
				 viewMode: "years", 
				 minViewMode: "years"		 
		 });
		/* end of date picker */
		 
		/* msg dismiss */
		 var counter = 5;
			var interval = setInterval(function() {
			    counter--;
			    // Display 'counter' wherever you want to display it.
			    $('.msgResult span').html('( '+counter+'s )');
			    if (counter == 0) {
			        // Display a login box
			    	$('.msgResult').fadeOut();
			        clearInterval(interval);
			    }
			}, 1000);				
		/* end of msg dismiss */
})

function clearDate(){
		$('#year').val('');
}

function position_up(id){
	$('#position_up_'+id).submit();
}
function position_down(id){
	$('#position_down_'+id).submit();
}


function reloadCurrentPage()
{
	location.reload();
}

function deleteItem(id,thumb)
{
	$('#deleteItem .modal-body').html(
			'<p><img src="../uploads/thumbs/'+thumb+'"></p>'
			+'<p>Would you like to delete this photo ?<br><b><small>'+thumb+'</small></b></p>'
	);
	$('#deleteItem .modal-footer').html(
			'<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel <i class="glyphicon glyphicon-ban-circle"></i></button>'+
			'<button class="btn btn-danger" onclick="doDelete('+id+')">Yes <i class="glyphicon glyphicon-trash"></i></button>'		
	);
	$('#deleteItem').modal({})
}

function doDelete($id)
{	 var url = "gallery/gallery/deleteItem";
	console.log(url);
	$.post(url,{ id: $id  },function(data){
		var arr = JSON.parse(data);
		if(arr.result == true){
			$('#deleteItem .modal-body').append(
					'<p class="alert alert-success">This photo has been deleted.</p>'	
				);
			$('.row .item_'+$id).fadeOut();
			  
		}else{
			$('#deleteItem .modal-body').append(
				'<p class="alert alert-danger">Error, can not delete this photo.</p>'	
			);
		}
		
		$('#deleteItem .modal-footer').html(
				'<button class="btn btn-primary" onclick="reloadCurrentPage()">ok</button>'
				);		  
		 console.log(arr.result);
			   });
}