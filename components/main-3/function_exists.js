
function function_exits( func ){

	if(typeof window[func] === "function"){
		return true;

	} else {
		return false;
	}

}

