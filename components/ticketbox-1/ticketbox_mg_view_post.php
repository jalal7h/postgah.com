<?

function ticketbox_mg_view_post( $rw ){

	$c.= "
	<div class=\"post\">
		<div class=\"info\">
			".( is_component('useravatar') ? useravatar( $rw['user_id'] ) : '' )."
			<div class=\"user\">".table('user', $rw['user_id'])['name']."</div>
			<div class=\"date\">".time_inword($rw['date_created'])."</div>
		</div><div class=\"text\">".nl2br($rw['text'])."</div>
	</div>";

	return $c;

}


