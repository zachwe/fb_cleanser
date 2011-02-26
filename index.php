<?php
	require_once('fb-auth.php');
	$facebook = FacebookAuth::getSession();
	$naitik = $facebook->api('/naitik');
?>
<html>
<head>

</head>
<body>
	<p>Welcome to Facebook Cleanser!</p>

	<?php
		echo $naitik['name']
	?>
</body>
</html>
