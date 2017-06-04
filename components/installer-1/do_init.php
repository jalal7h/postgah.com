<?

# jalal7h@gmail.com
# 2017/05/09
# 1.1

if( debug === true ){
	add_init( 'install_init' );
}

function install_init(){

	if( its_local() ){
		Installer::init();
	}

}


