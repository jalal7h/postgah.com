<?php

$client_id = '595759914657-l06lgcn7hvog3tpbjhne7psmh3pp5t79.apps.googleusercontent.com';
$client_secret = 'Ak4Z4xgxdmltIk1O3IrKPGNj';



function google_login_api_done( $info ){

	$params = array(
	    'auth'=>'google',
	    'name'=> $info->name,
	    'email'=> $info->email,
	    'auth_id'=> $info->id,
	    'avatar'=> $info->picture,
	);
	// var_dump($params);die();
	$json = json_encode( $params );

	echo "<script>location.href='" . _URL . "/../../../?do_action=user_weblogin_do&json=". urlencode($json) . "';</script>";
	die();

}















############################################################################
#
# set defines
$URLFOTDEFINE = "http://".str_replace("/","",$_SERVER['HTTP_HOST']);
$SUBFOLDER = substr( dirname($_SERVER['SCRIPT_NAME']),1,strlen(dirname($_SERVER['SCRIPT_NAME'])) );
if(strlen($SUBFOLDER)!=0) $URLFOTDEFINE .= "/".$SUBFOLDER;
define('_URL',$URLFOTDEFINE);
#
############################################################################

$redirect_uri = _URL;

session_start(); //session start
require_once ('libraries/Google/autoload.php');

// $_SESSION['access_token'] = null;

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);
  
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

if (isset($authUrl)){ 
	?>
	<script type="text/javascript">
		location.href = '<?php echo $authUrl; ?>';
	</script>
	<?
	
} else {
	$user = $service->userinfo->get();
	google_login_api_done( $user );
}



