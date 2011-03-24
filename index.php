<?php

	$config['baseurl']  =   "http://zachwe.dyndns.org:8888/index.php";
	require_once('fb-auth.php');
	require_once('FbQueryProcessor.php');
	$appid = FacebookAuth::$appid;
	$app_secret = FacebookAuth::$secret;
	$url = urlencode('http://zachwe.dyndns.org:8888/fb_cleanser');
	$facebook = FacebookAuth::getFacebook();
	$session = FacebookAuth::getSession($facebook);
	$me = FacebookAuth::getMe($facebook, $session);
	if($me) {
		$logoutUrl = $facebook->getLogoutUrl();
	} else {
		$loginUrl = $facebook->getLoginUrl(array('req_perms' => 'email,read_stream'));
	}
?>
<html>
<head>
	<!--Include JQuery via Google CDN-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>
<body>
	<?if($me) {
		echo 'Hello, ' . $me['name'] . "!\n";
	}?>
	<? if($me) { ?>
		<a href="<?echo $logoutUrl;?>">Log Out</a>
	<? } else { ?>
		<a href="<?echo $loginUrl;?>">Log In</a>
	<? } ?>
	<p>Welcome to Facebook Cleanser!</p>

	<? if($me) { ?>
		<!--use ajax to query the endpoint getFacebookPosts-->		

	<? } ?>
</body>
</html>
