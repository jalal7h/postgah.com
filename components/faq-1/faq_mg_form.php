<?

function faq_mg_form(){
	
	if($id = $_REQUEST['id']){
		$rw = table("faq", $id);
	}
	
	echo
	fm(array('name'=>'faq_mg_form' , 'class'=>'faq_mg_form' , 'method'=>'post' , 'action'=>'?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_list','save_switch'=>'do')).
	ff(array( lmtc('faq:name') ,'n:name'=>$rw,'inDiv')).
	ff(array( lmtc('faq:text') ,'t:textarea','n:text'=>$rw,'inDiv')).
	ff(array( 't:submit','n:submit'=>__('ثبت'), 'class'=>'btn btn-primary','inDiv'));
	
	fm('close');

}

