<?

function ticketbox_view_post( $rw ){

	$c.= "
	<div class=\"post\" post_id=\"".$rw['id']."\" >
		
		".( is_admin() ? "<div class=\"remove\" text_remove=\"".__('آیا مایل به حذف هستید؟')."\" ></div>" : '' )."
		
		<div class=\"info ".( is_adminUser($rw['user_id']) ? 'admin' : 'user' )."\">
			".( is_component('useravatar') ? useravatar( $rw['user_id'] ) : '' )."
			<div class=\"user\">".table('user', $rw['user_id'])['name']."</div>
			<div class=\"date\">".time_inword($rw['date_created'])."</div>
		</div>".
		
		"<div class=\"text\">".nl2br($rw['text'])."</div>

	</div>";

	return $c;

}


