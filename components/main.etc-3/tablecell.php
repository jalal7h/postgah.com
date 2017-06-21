<?php

# jalal7h@gmail.com
# 2017/06/10
# 1.0

function tablecell( $data ){
	
	if( var_control( $data, '()\[\]' ) != '()[]' ){
		return false;
	
	} else {
		
		list( $table_name , $data ) = explode( '(', $data );
		list( $id_value, $data ) = explode( ')[', $data );
		list( $value_column, $data ) = explode( ']', $data );

		if(! is_column( $table_name, $value_column ) ){
			return false;

		} else if(! $rw = table($table_name, $id_value) ){
			return false;

		} else {
			return $rw[ $value_column ];
		}

	}

}

