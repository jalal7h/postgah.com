<?

function ticketbox_view_post( $rw ){

	$c.= "
	<div class=\"post\" post_id=\"".$rw['id']."\" >
		
		".( is_admin() ? "<div class=\"remove\" text_remove=\"".__('آیا مایل به حذف هستید؟')."\" ></div>" : '' )."
		
		<div class=\"info ".( is_adminUser($rw['user_id']) ? 'admin' : 'user' )."\">
			".( is_component('useravatar') ? useravatar( $rw['user_id'] ) : '' )."
			<div class=\"user\">".
				( is_admin() ? '<a href="'.user_loginLink($rw['user_id']).'">' : '' ).
				table('user', $rw['user_id'])['name'].
				( is_admin() ? '</a>' : '' ).
				"</div>
			<div class=\"date\" title=\"".UDate($rw['date_created'],'text')." ".UClock($rw['date_created'])."\">".time_inword($rw['date_created'])."</div>
		</div>".
		
		"<div class=\"text\">".nl2br($rw['text'])."</div>

	</div>";

	return $c;

}


