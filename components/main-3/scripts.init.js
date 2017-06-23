
// fetch the hashtag
var hash = location.hash.substr(1);


$(document).ready(function() {


	// scroll to hash section
	// $("a").on('click', function(event) {
	// 	if( this.hash !== "" ) {
	// 		event.preventDefault();
	// 		var hash = this.hash;
	// 		$('html, body').animate({
	// 			scrollTop: $(hash).offset().top
	// 		}, 800, function(){
	// 			window.location.hash = hash;
	// 		});
	// 	}
	// });


	// autocomplete off
	setTimeout(function(){
		$("input").each(function(i) {
			the_tag_name = $(this).attr('name');
			if (typeof the_tag_name === 'undefined' ) {
				//
			} else if( the_tag_name.indexOf( "[" ) > -1 ){
				//
			} else {
				the_value = $(this).val();
				$(this).val( '' );
				$(this).val( the_value );
			}
		});

	}, 100);


	// numeric force input
	$("body").delegate('.numeric', 'keydown', function(e) {
    
        // .
        if( e.keyCode == 190 ){
        	return;

        // F5
        } else if( e.keyCode == 116 ){
        	return;

        // ctrl
        } else if( e.ctrlKey || e.metaKey ){
        	return;

        // +
        } else if( e.shiftKey ){
        	if( e.keyCode == 187 ){
        		return;
        	}

        // Allow: backspace, delete, tab, escape, and enter
        } else if( e.keyCode == 13 || e.keyCode == 27 || e.keyCode == 46 || e.keyCode == 8 || e.keyCode == 9 ){
        	return;

        // numeric without shift
        } else if( (!e.shiftKey) && (event.keyCode >= 48) && (event.keyCode <= 57) ){
        	return;
        
        // numeric without shift on numlock
        } else if( (!e.shiftKey) && (event.keyCode >= 96) && (event.keyCode <= 105) ){
        	return;
        
        // navigation
        } else if( e.keyCode >=37 && e.keyCode <=40 ){
        	return;
        }

        e.preventDefault();

    });

});

function wget(urlpath, id, pars){ // jquery
	if(pars!=''){
		var mtd = 'POST';
	} else {
		var mtd = 'GET';
	}
	if(urlpath.indexOf("?")==-1){
		;//
	} else {
		if(pars=='') {
			pars = urlpath.substring(urlpath.indexOf("?")+1,urlpath.length);
		}
		urlpath = urlpath.substring(0,urlpath.indexOf("?"));
	}
	$.ajax({
		 type: mtd
		,url: urlpath
		,data: pars
		,cache: false
		,success: function(html){
			if(id!=''){
				$("#"+id).html(html);
			}
		}
	});
}

function str_replace(find,replace,string){
	var fndLng=find.length;
	for(i=0; i<string.length; i++){
		if(string.substr(i,fndLng)==find){
			string=string.substring(0,i)+replace+string.substring(i+fndLng,string.length);
		}
	}
	return string;
}

function isnumeric(Str){
	var Str2 = Str;
	Str2++;Str2--;
	if(Str==Str2){
		return true;
	} else {
		return false;
	}
}

function Isnumber(Str){
	return isnumeric(Str);
}

function number_format(n){
	n = str_replace(",","",n);
	if(!isnumeric(n)){
		return n;
	} else {
		//
	}
	var l=0,t='',r='';
	n = n.toString();
	do {
		l = n.length;
		t = n.substring(l-3,l);
		n = n.substring(0,l-3);
		if(r!=''){
			r = t+","+r;
		} else {
			r = t;
		}
	} while(n.length>0);
	return r;
}

function cl(t){
	if( debug == true ){
		console.log(t);
	}
}

function rand( n ){
	return Math.round( Math.random() * Math.pow( 10 , n ) );
}

function is_defined( n ){
	if( typeof n === typeof undefined ){
		return false;
	} else {
		return true;
	}
}

function getGridNumber( t ){
	jQuery(document).ready(function($) {
		for( i=1; i<=12; i++ ){
			the_class = 'grid'+i;
			if( t.hasClass('grid'+i) ){
				break;
			}
		}
	});
	return i;
}

iframe = function( url ){
	return '<iframe src="'+url+'" frameborder=0 ></iframe>';
}





