<?

# jalal7h@gmail.com
# 2016/09/14
# 1.2

# is_column( table_name , array_of_column_names or a_single_column_name ) [ true / false ]

/*README*/

function is_column( $table, $column ){
	
	if( $table=="" or $column=="" ){
		return false;
	
	} else if(! is_table($table) ){
		return false;

	} else if(! $rs = dbq(" DESCRIBE `$table` ") ){
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

