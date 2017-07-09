<?

# taghipoor.meysam@gmail.com
# 2016/12/10
# 1.1

function news_mg_saveEdit(){
	
	#
	# insert
	$id = dbs( 'news', [ 'name', 'cat', 'text', 'tag' ], ['id'] );
	#

	#
	# upload photo
	listmaker_fileupload( 'news', $id, "*" );
	#

}


