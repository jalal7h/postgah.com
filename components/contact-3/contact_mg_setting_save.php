<?

# jalal7h@gmail.com
# 2017/01/21
# 1.0

function contact_mg_setting_save(){

	#
	# contact details
	setting( 'contact_tell', $_REQUEST['contact_tell'] );
	setting( 'contact_cell', $_REQUEST['contact_cell'] );
	setting( 'contact_fax', $_REQUEST['contact_fax'] );
	setting( 'contact_address', $_REQUEST['contact_address'] );

	#
	# email addresses
	if( sizeof($_REQUEST['contact_email_address']) ){
		foreach( $_REQUEST['contact_email_address'] as $i => $email ){
			
			$slug = 'contact_email_address_'.$i;

			if(! $email ){
				dbq(" DELETE FROM `setting` WHERE `slug`='$slug' LIMIT 1 ");
				
			} else {
				setting( $slug, $email );
			}
		}
	}
	
}

