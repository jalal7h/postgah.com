<?

# jalal7h@gmail.com
# 2015/09/18
# Version 1.1.1

/*
$list = array(
	array("name"=>"000", "text"=>"999"),
	array("name"=>"000", "text"=>"999"),
	array("name"=>"000", "text"=>"999"),
);

echo listmaker_clicktab($list);

in yechizi mesle in hast : 
http://khodropars.com/faq

ye serry onvan + matn migire
ru onvan mizani matn dide mishe

/*README*/


function listmaker_clicktab($list){
	
	if(! sizeof($list) ){
		return e();
	
	} else {
		foreach( $list as $k => $tab ){
			$list[$k]['text'] = nl2br($list[$k]['text']);
		}
		return template_engine( 'listmaker_clicktab', [ 'list' => $list ] );
	}
	
}



