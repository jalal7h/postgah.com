<?

# jalal7h@gmail.com
# 2016/12/30
# 1.0

add_slug([

	// 'tickets' => './?page=14&do=ticketbox_user_list' ,
	// 'ticket-$' => './?page=14&do=ticketbox_user_list&do1=view&id=$1' ,

	Slug::get('page',14) . '/ticket/new' => './?page=14&do_slug=ticket&do1=form' ,

]);

