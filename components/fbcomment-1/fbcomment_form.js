
// $('.fbcomment form.form > input:text').on("click", function(){
function fbcomment_inputCommentCl( x ){
	$(x).css({'border-color':'#BD3559'});
	$(x).parent().find('input[type="submit"]').css({'opacity':'1.0'});
}
function fbcomment_inputCommentBl( x ){
	$(x).css({'border-color':''});
}


// save comment
// $('.fbcomment form.form').on("submit", function(){
function fbcomment_saveComment( x ){
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
			data: 'do_action=fbcomment_do&table='+table+'&text='+text ,
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
function fbcomment_subCommentVisible( x ){
	// console.log('dd');
	$(x).parent().parent().parent().find('> .fbcomment > form.form').toggle();
	$(x).parent().parent().parent().find('> .fbcomment > form.form input[type="text"]').focus();
	return false;
}




