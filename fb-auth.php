<?php
require_once('facebook/facebook.php');

class FacebookAuth {
	//Application ID
	static $appid = '195701533788444';
	//Fb Application Secret
	static $secret = '8ebe972a0b19ea0def1a4fc9ab9005b4';

	//Returns a Facebook object	
	static function getFacebook() {
		return new Facebook(array('appId'=>FacebookAuth::$appid,
					'secret'=>FacebookAuth::$secret,
					'cookie'=>true)); 
	}
	
	//
	static function getSession($facebook) {
		return $facebook->getSession();
	}
	
	static function getMe($facebook, $session) {
		$me = null;
		if ($session) {
		  try {
		      $uid = $facebook->getUser();
		      $me = $facebook->api('/me');
		  } catch (FacebookApiException $e) {
		      error_log($e);
		      return false;
		  }
		  return $me;
		}
		
	}
}
?>
