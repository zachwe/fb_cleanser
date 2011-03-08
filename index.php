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
	<?
	if($me) {
		//Get posts from each friend, in order to expand range.
		$date = new DateTime('2009-01-01');
		$twenty_oh_nine = $date->getTimestamp();
		$query = "SELECT post_id, viewer_id, source_id, actor_id, target_id, message, comments, privacy FROM stream WHERE source_id='$me[id]' AND created_time < $twenty_oh_nine";
		//$query = "SELECT name, hometown_location, sex, pic_square FROM user WHERE uid = '$me[id]'";
		echo $query;
		$results = FbQueryProcessor::query($query, $facebook);
		foreach( $results as $result) {
			foreach($result as $key=>$item) {
				print "$key, $item";
				print "<br/>";
			}
			print "<br/>";
		}

	}
	?>
</body>
</html>
