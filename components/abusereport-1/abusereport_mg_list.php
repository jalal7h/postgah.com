<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function abusereport_mg_list(){
	
	#
	# actions
	switch ($_REQUEST['do']) {
		
		case 'remove':
			abusereport_remove( $_REQUEST['id'] );
			break;
		
		case 'remove_user':
			abusereport_mg_removeUser();
			break;

		case 'view':
			return abusereport_mg_view();

	}


	###################################################################################
	# the new version 1.30

	# 
	# the list
	$table = 'abusereport';
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `$table` WHERE `flag`='0' ORDER BY `date_created` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'"';

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'].'&do=view&id=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['remove_url'] = true; // link dokme hazf
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	# list array // list e sotun haye list
	$list['list_array'][] = array( "head"=>lmtc($table.":user_id"), "content" => '
		
		( $rw["user_id"]
			? ( user_detail($rw["user_id"]) ? user_detail($rw["user_id"])["name"] : "['.__('حذف شده').']" )
			: "['.__('ناشناس').']"
		)

		');

	$list['list_array'][] = array("head"=>__('مورد تخلف'), "content" => '

		lmtc($rw["table_name"])[0]." : ".

		( table($rw["table_name"],$rw["table_id"]) 
			? ( table($rw["table_name"],$rw["table_id"])["name"] 
				? table($rw["table_name"],$rw["table_id"])["name"]
				: mb_substr( table($rw["table_name"],$rw["table_id"])["text"], 0 , 200 )." .."
			  )
			: "['.__('حذف شده').']"
		)

	' );
	
	$list['height'] = 100;

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "text", "user(user_id)[name]" ];


	#
	# paging select
	$list['paging_select']['cat_id'] = "<option value=''>".lmtc($table.':cat_id')."</option>".cat_display('abusereport',$is_array=false);

	if( dbn( dbq($list['query']) ) > 0 ){
		$option_list = '';
		if(! $rs = dbq(" SELECT DISTINCT `table_name` FROM `abusereport` WHERE `flag`='0' ") ){
			e();
			
		} else if(! dbn($rs) ){
			e();

		} else while( $rw = dbf($rs) ){
			if(! $table_title = lmtc($rw['table_name'])[0] ){
				$table_title = $rw['table_name'];
			}
			$option_list.= "<option value=\"".$rw['table_name']."\">".$table_title."</option>";
		}
		if( $option_list ){
			$list['paging_select']['table_name'] = "<option value=''>".__('بخش')."</option>".$option_list;
		}
	}
	
	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

	
}







