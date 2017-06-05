
pug_cat_id = 0;
pug_pos_id = 0;

function lmfetc_extra_before( cat_id ){
	
	if( cat_id === null ){
		cat_id = 0;
	}

	pug_cat_id = cat_id;
	pgPlan_user_getPlansForThisCat();

}


function lmfetp_extra_before( position_id ){

	if( position_id === null ){
		position_id = 0;
	}
	
	pug_pos_id = position_id;
	pgPlan_user_getPlansForThisCat();

}


function pgPlan_user_getPlansForThisCat(){

	jQuery(document).ready(function($) {
		
		// item_id = $('.pgItem_user_form .plans').attr('item_id');
		// if( item_id!='' ){
		// 	item_id_query = '&item_id=' + item_id;
		// }
		// +item_id_query

		$.ajax({
			method: "GET",
			url: './?do_action=pgPlan_user_getPlansForThisCat&cat_id='+pug_cat_id+'&position_id='+pug_pos_id
		
		}).done(function( html ) {
			if( html.trim() != '' ){
				$('.pgItem_user_form .plans').show();
				$('.pgItem_user_form .list_of_plans .etc').html( html );
			}
		});

	});

}











