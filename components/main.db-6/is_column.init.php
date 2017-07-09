<?php

# jalal7h@gmail.com
# 2017/06/09
# 1.3

# is_column( table_name , array_of_column_names or a_single_column_name ) [ true / false ]

/*README*/

function is_column( $table, $column ){

	if( $GLOBALS[ __FUNCTION__ ][ "$table $column" ] === null ){
		$GLOBALS[ __FUNCTION__ ][ "$table $column" ] = is_column_this( $table, $column );
	}

	return $GLOBALS[ __FUNCTION__ ][ "$table $column" ];

}

function is_column_this( $table, $column ){
	
	if( $table == '' or $column == '' ){
		return false;
	
	} else if(! is_table($table) ){
		return false;

	} else if(! $rs = dbq(" DESCRIBE `$table` ", $force ) ){
		dg('there is no table named as '.$table);
	
	} else {
		
		while( $rw = dbf($rs) ){
			$field_array[] = $rw['Field'];
		}

		if( is_array($column) ){
			foreach ($column as $i => $this_column) {
				if(! in_array($this_column, $field_array) ){
					return false;
				}
			}
			return true;

		} else if(! sizeof($field_array) ){
			dg('there is no column in '.$table);

		} else if( in_array($column, $field_array) ){
			return true;
		}

	}

	return false;

}



