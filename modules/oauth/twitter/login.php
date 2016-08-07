<?php

require_once('twitteroauth/twitteroauth.php');
include('config.php');

###########################################################################################
#
# set defines
$URLFOTDEFINE = "http://".str_replace("/","",$_SERVER['HTTP_HOST']);
$SUBFOLDER = substr( dirname($_SERVER['SCRIPT_NAME']),1,strlen(dirname($_SERVER['SCRIPT_NAME'])) );
if(strlen($SUBFOLDER)!=0) $URLFOTDEFINE .= "/".$SUBFOLDER;
define('_URL',$URLFOTDEFINE);
#
###########################################################################################

$OAUTH_CALLBACK = _URL . '/oauth.php';

if( $_SESSION['name'] && $_SESSION['twitter_id'] ) //check whether user already logged in with twitter
{
	$params = array(
		'auth'=>'twitter',
		'name'=> $_SESSION['name'],
		'email'=> $_SESSION['twitter_id'],
		'auth_id'=> $_SESSION['request_vars']['user_id'],
		'avatar'=> $_SESSION['image'],
	);

	$json = json_encode( $params );

	echo "<script>location.href='" . _URL . "/../../../?do_action=users_weblogin_do&json=". urlencode($json) . "';</script>";
	die();
}
else // Not logged in
{

	$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
	$request_token = $connection->getRequestToken($OAUTH_CALLBACK); //get Request Token

	if(	$request_token)
	{
		$token = $request_token['oauth_token'];
		$_SESSION['request_token', $token];
		$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];
		
		switch ($connection->http_code) 
		{
			case 200:
				$url = $connection->getAuthorizeURL($token);
				//redirect to Twitter .
		    	header('Location: ' . $url); 
			    break;
			default:
			    echo "Coonection with twitter Failed";
		    	break;
		}

	}
	else //error receiving request token
	{
		echo "Error Receiving Request Token";
	}
	

}



?>