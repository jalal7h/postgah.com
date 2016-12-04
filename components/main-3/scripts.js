
$(document).ready(function() {

	// numeric force input
    $(".numeric").keydown(function(e) {
    	
        // Allow: backspace, delete, tab, escape, and enter
        // if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
        //      // Allow: Ctrl+A
        //     (event.keyCode == 65 && event.ctrlKey === true) || 
        //      // Allow: home, end, left, right
        //     (event.keyCode >= 35 && event.keyCode <= 39)) {
        //          // let it happen, don't do anything
        //          return;
        
        // } else {
        //     // Ensure that it is a number and stop the keypress
        //     if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
        //         event.preventDefault(); 
        //     }   
        // }


        // F5
        if( e.keyCode == 116 ){
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

function cl(t){console.log(t);}


