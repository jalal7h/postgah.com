<?

# jalal7h@gmail.com
# 2017/02/05
# 1.1

add_slug([
	
	// 'new_item' => './?page=14&do=pgItem_user&do1=form' ,
	Slug::get('page',14)."/items/new" => './?page=14&do=pgItem_user&do1=form' ,
	Slug::get('page',14)."/items/edit/$" => './?page=14&do1=form&id=$1' ,
	
]);

