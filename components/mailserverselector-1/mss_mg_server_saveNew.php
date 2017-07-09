<?

# jalal7h@gmail.com
# 2016/08/28
# 1.0

function mss_mg_server_saveNew(){

	dbs( 'mailserverselector_provider', [ 'name', 'type', 'sender_name', 'sender_addr', 'server_addr', 'server_port', 'server_username', 'server_password', 'flag'=>'1' ] );

}



