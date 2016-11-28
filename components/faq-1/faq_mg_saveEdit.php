<?

function faq_mg_saveEdit(){
	
	dbs( 'faq', ['name','text'], ['id'] );
	
}

