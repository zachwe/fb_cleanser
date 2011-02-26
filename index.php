<html>
<head>

</head>
<body>
<?php
	require_once('fb-auth.php');
	$appid = FacebookAuth::$appid;
	$app_secret = FacebookAuth::$secret;
	$url = urlencode('http://localhost:8000/fb_cleanser');
	//$facebook = FacebookAuth::getSession();
	$code = $_REQUEST["code"];

	if(empty($code)) {
		echo "quiz quiz quiz";
		$dialog_url = "https://www.facebook.com/dialog/oauth?
		     client_id=$appid&redirect_uri=$url";
		echo "<script> top.location.href='$dialog_url'</script>";
		echo "test test test test test";
	}
	$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
	        . $appid . "&redirect_uri=" . $url . "&client_secret="
		        . $app_secret . "&code=" . $code;

	$access_token = file_get_contents($token_url);
	$graph_url = "https://graph.facebook.com/me?" . $access_token;
	$user = json_decode(file_get_contents($graph_url));
	echo("Hello " . $user->name);
?>
	<p>Welcome to Facebook Cleanser!</p>
</body>
</html>
