<?

function ticketbox_view_name(){

	if(! $id = $_REQUEST['id'] ){
		e();

	} else if(! $rw = table('ticketbox', $id) ){
		e();

	} else {
		$c.= "
		<div class=\"name\">
			<div class=\"the_name\">#".$rw['id']." ".$rw['name']."
			<div class=\"etc\">
				".( $rw['cat'] ? "
				<div class=\"category\">".cat_translate($rw['cat'])."</div>
				<span></span>
				" : '' )."
				<div class=\"the_date\" title=\"".UDate($rw['date_created'],'text')." ".UClock($rw['date_created'])."\">".time_inword($rw['date_created'])."</div>
			</div>
		</div>";
	}
	
	return $c;

}

