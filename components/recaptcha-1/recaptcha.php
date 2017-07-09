<?php

# jalal7h@gmail.com
# 2017/01/25
# 1.0

function recaptcha(){
	
	return '
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<div class="g-recaptcha" data-sitekey="'.recaptcha_public_key.'"></div>
	';
	
}

