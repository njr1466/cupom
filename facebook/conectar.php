<?php
session_start(); //Session should be active

$app_id             = '248775021897049';  //Facebook App ID
$app_secret         = '9899eeb39e70aa571efeedee18b57857'; //Facebook App Secret
$required_scope     = 'public_profile, publish_actions, email'; //Permissions required
$redirect_url       = 'http://localhost:83/akipom/teste.php'; //FB redirects to this page with a code

//include autoload.php from SDK folder, just point to the file like this:
require_once "autoload.php";
 $_SESSION['logado'] = 0;
//import required class to the current scope
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication($app_id , $app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);

//try to get current user session
try {
  $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
    die(" Error : " . $ex->getMessage());
} catch(\Exception $ex) {
    die(" Error : " . $ex->getMessage());
}

if ($session){ //if we have the FB session
    $user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
    //do stuff below, save user info to database etc.
    $_SESSION['logado'] = 1;
    echo '<pre>';
    //print_r($user_profile); //Or just print all user details
    echo '</pre>';
    //echo $_SESSION['logado'];
    
    
    $_SESSION['UID'] =  $user_profile->getProperty('id'); 
    //echo $user_profile->getProperty('name'); 
    //echo $user_profile->getProperty('first_name'); 
    //echo $user_profile->getProperty('email');   

    
}else{ 

    //display login url 
    $login_url = $helper->getLoginUrl( array( 'scope' => $required_scope ) );
    echo '<a href="'.$login_url.'">Login with Facebook</a>'; 
 
}

