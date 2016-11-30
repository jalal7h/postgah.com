<?

function ezTicket_user_list_this( $rw ){
	
	$date = $rw['date'];
	$date = u2vaght($date);
	$date = substr($date,0,16);
	
	echo "
	<a href='"._URL."/?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=ezTicket_user_form&id=".$rw['id']."' class='r' >
		<div class='id' >#".$rw['id']."</div>
		<div class='name".($rw['view_by_user']==0?" bold":"")."' >".$rw['name']."</div>
		<div class='date' >".$date."</div>
	</a>";
	
}

