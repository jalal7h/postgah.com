<?

function faq_management_saveEdit(){
	
	dbs( 'faq', ['name','text'], ['id'] );
	
}

