<?php
        session_start();
        include('config.php');
        include('hybridauth/Hybrid/Auth.php');
        if(isset($_GET['provider']))
        {
        	$provider = $_GET['provider'];
        	// var_dump($config);die();
        	try{
        	
        	$hybridauth = new Hybrid_Auth( $config );
        	
        	$authProvider = $hybridauth->authenticate($provider);

	        $user_profile = $authProvider->getUserProfile();
	        
			if($user_profile && isset($user_profile->identifier))
	        {
	        	// echo "<b>Name</b> :".$user_profile->displayName."<br>";
	        	// echo "<b>Profile URL</b> :".$user_profile->profileURL."<br>";
	        	// echo "<b>Image</b> :".$user_profile->photoURL."<br> ";
	        	// echo "<img src='".$user_profile->photoURL."'/><br>";
	        	// echo "<b>Email</b> :".$user_profile->email."<br>";
	        	// echo "<br> <a href='logout.php'>Logout</a>";

                        $params = array(
                            'auth'=>'twitter',
                            'name'=> trim($user_profile->firstName." ".$user_profile->lastName),
                            'email'=> $user_profile->email,
                            'auth_id'=> $user_profile->displayName,
                            'avatar'=> $user_profile->photoURL,
                        );
                        // var_dump($user_profile);die();
                        // var_dump($params);die();
                        $json = json_encode( $params );

                        echo "<script>location.href='" . _URL . "/../../../?do_action=user_weblogin_do&json=". urlencode($json) . "';</script>";
                        die();

	        }	        

			}
			catch( Exception $e )
			{ 
			
				 switch( $e->getCode() )
				 {
                        case 0 : echo "Unspecified error."; break;
                        case 1 : echo "Hybridauth configuration error."; break;
                        case 2 : echo "Provider not properly configured."; break;
                        case 3 : echo "Unknown or disabled provider."; break;
                        case 4 : echo "Missing provider application credentials."; break;
                        case 5 : echo "Authentication failed. "
                                         . "The user has canceled the authentication or the provider refused the connection.";
                                 echo "<script>location.href='../../..'</script>";
                                 die();
                                 break;
                        case 6 : echo "User profile request failed. Most likely the user is not connected "
                                         . "to the provider and he should to authenticate again.";
                                 $twitter->logout();
                                 break;
                        case 7 : echo "User not connected to the provider.";
                                 $twitter->logout();
                                 break;
                        case 8 : echo "Provider does not support this feature."; break;
                }

                // well, basically your should not display this to the end user, just give him a hint and move on..
                echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();

                echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";

			}
        
        }
?>