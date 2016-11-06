<?

# jalal7h@gmail.com
# 2016/10/23
# 2.2


# texty_prompt( $slug , $vars=null, $convbox=true )
# __BEFORE__ , __AFTER__
# it does support slug named template.htm

/*README*/

function texty_prompt( $slug , $vars=null, $convbox=true ){
	
	#
	# get the prompt
	if(! $texty = texty_fetch( $slug ) ){
		// e( __FUNCTION__, __LINE__, 'cant find the slug named as '.$slug );
		return false;

	#
	# if its set
	} else if(! $prompt = trim($texty['prompt']) ){
		// e(__FUNCTION__,__LINE__);

	} else {
		
		#
		# replace vars
		if( sizeof($vars) ){
			foreach ( $vars as $k => $v ) {
				$prompt = str_replace('{'.$k.'}', $v, $prompt);
			}
		}

		#
		# fix prompt
		$prompt = $vars['__BEFORE__'].$prompt.$vars['__AFTER__'];
		$prompt = nl2br($prompt);

		#
		# if any cover
		if( $GLOBALS['include_all_template'][$slug.'.template.htm'] ){
			$vars['prompt'] = $prompt;
			$prompt = template_engine( $slug , $vars );
		} else if( $convbox ){
			$prompt = "<div class='convbox".( $vars['prompt_class'] ? " ".$vars['prompt_class'] : '' )."' texty='".$slug."' >".$prompt."</div>";
		}
			
		return $prompt;

	}

	return false;

}

