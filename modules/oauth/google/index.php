<?php

require_once('libraries/Google/autoload.php');
require_once('config.php');

###########################################################################################
#
# set defines
$URLFOTDEFINE = "http://".str_replace("/","",$_SERVER['HTTP_HOST']);
$SUBFOLDER = substr( dirname($_SERVER['SCRIPT_NAME']),1,strlen(dirname($_SERVER['SCRIPT_NAME'])) );
if(strlen($SUBFOLDER)!=0) $URLFOTDEFINE .= "/".$SUBFOLDER;
define('_URL',$URLFOTDEFINE);
#
###########################################################################################

$redirect_uri = _URL . '/';

/** logout **/
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if ( $_SESSION['access_token'] ) {
  $client->setAccessToken( $_SESSION['access_token'] );
} else {
  $authUrl = $client->createAuthUrl();
}



if(isset($authUrl)){ 
  echo "<script>location.href='" . $authUrl . "'</script>";
  die();
} else {
  $auth = $service->userinfo->get();

  $params = array(
    'auth'=>'google',
    'name'=> $auth['modelData']['given_name']." ".$auth['modelData']['family_name'],
    'email'=> $auth->email,
    'auth_id'=> $auth->id,
    'profile'=> $auth->link,
    'gender'=> $auth->gender,
    'avatar'=> $auth->picture,
  );

  $json = json_encode( $params );
  
  echo "<script>location.href='" . _URL . "/../../../?do_action=users_weblogin_do&json=". urlencode($json) . "';</script>";
  
}










