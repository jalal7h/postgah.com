
// taghipoor.meysam@gmail.com
// 2016/12/11
// 1.1

jQuery(document).ready(function($) {
	
    //عملیات کلیک 
	$('.bookmarky').on('click', function(e){

		if( $(this).hasClass('logged') ){

			$(this).toggleClass('active');

			//آیدی آیتمی که روش کلیک شده ، تا نتیجه در اون دیو قرار بگیره
			id = $(this).attr('id');
			
			// متغییر های مورد تیاز
			table_name = $(this).attr('table_name');
			table_id = $(this).attr('table_id');

			$.ajax({
				url:'./?do_action=bookmarky_ajax',
				data:{table_name:table_name,table_id:table_id},
				type:'post',
				success:function(data){
					span = '#'+id+">.simplefavorite-button-count";			
					$(span).text(data);	
			    },
			});
		
		} else {
			alert( $(this).attr('text_notLoggedIn') );
		}

	});
	
});