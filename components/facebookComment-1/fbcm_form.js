
// $('.fbcm form.form > input:text').on("click", function(){
function fbcm_inputCommentCl( x ){
	$(x).css({'border-color':'#BD3559'});
	$(x).parent().find('input[type="submit"]').css({'opacity':'1.0'});
}
function fbcm_inputCommentBl( x ){
	$(x).css({'border-color':''});
}


// save comment
// $('.fbcm form.form').on("submit", function(){
function fbcm_saveComment( x ){
	text = $(x).find('input:text').val();
	$(x).find('input:text').val('');
	if( text=='' ){
		return false;
	} else {
		table = $(x).find('input:text').attr('rel');
		list_id = $(x).attr('rel');
		$.ajax({
			type: 'GET' ,
			url: './' ,
			data: 'do_action=fbcm_do&table='+table+'&text='+text ,
			cache: false ,
			success: function(html){
				console.log( list_id );
				$('#'+list_id).prepend( html );
			}
		});
	}
	
	return false;
}


// visible sub comment form
function fbcm_subCommentVisible( x ){
	// console.log('dd');
	$(x).parent().parent().parent().find('> .fbcm > form.form').toggle();
	$(x).parent().parent().parent().find('> .fbcm > form.form input[type="text"]').focus();
	return false;
}


