<?

# jalal7h@gmail.com
# 2017/02/26
# 2.1


/*

	#############################################################
	echo listmaker_list([
		'head'	=> 'DailyTour Bookings',
		'table' => 'tallfooter',
		'where' => [ 'flag'=>1 ],
		'order' => [ 'id' => 'asc', 'date' ], // default: asc. default: prio, date_updated, date_created, date
		'limit' => 10,
		'url' => [
			'base' => '_URL."/?page=admin&cp=tallfooter_mg"', // *
			'target' => '_URL."/admin/tallfooter/edit/".$rw["id"]', // [true/false] // default false
			'add' => '', // [true/false] // default false
			'modify' => '', // [true/false] // default false
			'remove' => '', // [true/false] // default false
			'prio' => '', // [true/false] // default false
			'flag' => '', // [true/false] // default false	
		],
		'add_prompt' => 'new item link prompt',
		'filter' => [
			'the_slug' => [ 'the name', 'options in array or tag' ],
			'the_second' => [ 'the second name', 'options in array or tag' ],
		],
		'button' => [
			'the_name_of_button' => [
				'url'	=> 'some url', // it can be some function name , or url
				'icon'	=> '021',
				'name'	=> 'بروزرسانی',
				'color'	=> '#f00',
				'attr0'	=> 'attr value'
				'func'	=> 'some_func_name' // this will check if the button should be shown or not
			],
			'finilize' => [
				'url'	=> '_URL."/?page=admin&cp=dailytourorder_mg&do=finilize&id=".$rw["id"]."&p=".$_REQUEST["p"]',
				'icon'	=> '14a',
				'name'	=> 'Finilize',
				'color'	=> 'green',
				'confirm' => 'Are you sure to finilize this order?',
				'func'	=> 'dailytourorder_user_list_button_finilize_func',
			],
		],
		'item' => [
			'some text',
			[ 'tallfooter_mg_list_theName($rw)', 'head'=>lmtc("tallfooter:name") ],
			[ 'tallfooter_mg_list_theType($rw)', 'head'=>lmtc("tallfooter:type") ],
			[ '$rw["grid"]." / 12"', 'head'=>lmtc("tallfooter:grid") ],
		],
		'search' => [ 'name' ],
		'sort' => 'tallfooter/admin',
		'etc0' => 'value0', // attributes on table
	]);
	#############################################################

*/


function listmaker_list( $list ){


	if( !isset($list['table']) and !isset($list['item']) ){
		return listmaker_list_before16jan2016($list);
	}


	###################################################################################
	# the list
	#
	
	if(! $list['class'] ){
		$list['class'] = debug_backtrace()[1]['function'];
	}

	$table = $list['table'];
	$old_list['name'] = $list['table'];
	$old_list['query'] = " SELECT * FROM `$table` WHERE 1 ";
	
	if( sizeof($list['where']) ){
		foreach ($list['where'] as $i => $v ) {
			if(! is_numeric($i) ){
				$old_list['query'].= " AND `$i`='$v' ";
			} else {
				$old_list['query'].= " AND $v ";
			}
		}
	}


	if( sizeof($list['order']) ){
		foreach ($list['order'] as $i => $v ) {
			if(! is_numeric($i) ){
				$list_of_orders[] = " `$i` ".strtoupper($v)." ";
			} else {
				$list_of_orders[] = " `$v` ASC ";
			}
		}
		if( sizeof($list_of_orders) ){
			$old_list['query'].= " ORDER BY ".implode(', ', $list_of_orders );
		}

	} else if( is_column($table, 'prio') ) {
		$old_list['query'].= " ORDER BY `prio` ASC ";
	} else if( is_column($table, 'date_updated') ){
		$old_list['query'].= " ORDER BY `date_updated` DESC ";
	} else if( is_column($table, 'date_created') ){
		$old_list['query'].= " ORDER BY `date_created` DESC ";
	} else if( is_column($table, 'date') ) {
		$old_list['query'].= " ORDER BY `date` DESC ";
	} else {
		//
	}


	if( $list['limit'] ){
		$old_list['tdd'] = $list['limit'];
	}
	

	if( $list['add_prompt'] ){
		$old_list['addnew_prompt'] = $list['add_prompt'];
	}


	if( $list['search'] ){
		$old_list['search'] = $list['search'];
	}


	foreach ($list['item'] as $this_item) {
		if( is_array($this_item) ){
			foreach ($this_item as $k => $v) {
				if( is_numeric($k) ){
					$this_item['content'] = $v;
					unset($this_item[$k]);
					break;
				}
			}
			$old_list['list_array'][] = $this_item;
		} else {
			$old_list['list_array'][] = [ "content" => $this_item ];
		}
	}


	if( sizeof($list['filter']) ){
		foreach ($list['filter'] as $filter_slug => $filter_info) {
			
			if(! is_array($filter_info) ){
				$filter_info = [ cat_detail($filter_info)['name'], cat_display($filter_info) ];
			}

			$filter_name = $filter_info[0];
			$filter_option_list = $filter_info[1];
			$filter_option = "<option value=''>".$filter_name."</option>";
			if( is_array($filter_option_list) ){
				foreach ($filter_option_list as $k => $v) {
					$filter_option.= "<option value=\"$k\">$v</option>";
				}
			} else {
				$filter_option.= $filter_option_list;
			}
			$old_list['paging_select'][ $filter_slug ] = $filter_option;
		}
	}

	$old_list['head'] = $list['head'];
	$old_list['base_url'] = $list['url']['base'];
	$old_list['target_url'] = $list['url']['target'];
	$old_list['addnew_url'] = $list['url']['add'];
	$old_list['modify_url'] = $list['url']['modify'];
	$old_list['remove_url'] = $list['url']['remove'];
	$old_list['up_or_down'] = ( $list['sort'] ? false : $list['url']['prio'] );
	$old_list['setflag_url'] = $list['url']['flag'];
	// $old_list['paging_url'] = true; // not needed when we have 'tdd'


	if( sizeof($list['button']) ){
		foreach ($list['button'] as $button_name => $button_value) {
			$old_list['linkTo'][ $button_name ] = $button_value;
		}
	}
	
	$old_list['sort'] = $list['sort'];

	foreach ($list as $key => $value) {
		if(! in_array($key, ['table','where','order','limit','url','add_prompt','filter','button','item','search','sort'] ) ){
			$the_etc_s[] = $key.'="'.$value.'"';
		}
	}
	if( sizeof($the_etc_s) ){
		$old_list['etc'] = implode(' ', $the_etc_s);
	}

	return listmaker_list( $old_list );
	
}




