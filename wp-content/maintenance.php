<?php
$protocol = $_SERVER["SERVER_PROTOCOL"];
if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol ) {
	$protocol = 'HTTP/1.0';
	header( "$protocol 503 Service Unavailable", true, 503 );
}
header( 'Content-Type: text/html; charset=utf-8' );
header( 'Retry-After: 600' );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Maintenance</title>
    <meta http-equiv="refresh" content="60">
    <style>
    	body {
    		font-family: Tahoma, Verdana, "Lucida Sans Unicode", Arial, Helvetica, sans-serif;
    		font-size: 90%;
    		color:#333;
    	}
		.wrapper {
			width:600px;
			margin:40px auto;
			border:1px solid #ccc;
			padding:0px 20px 20px 20px;
		}
		h1 {
			text-align: center;
			color:#0164A7;
			font-size:1.5em;
		}
		.logo,
		.img {
			display: block;
    		margin:0 auto;
    		width:auto;
    		height: auto;
		}
		.logo {
			width:350px;
			margin-top:5px;
			margin-bottom:10px;
		}
		.img {
			width:450px;
			margin-top:5px;
			margin-bottom:15px;
		}
		p {
			line-height: 1.5;
		}
	</style>
</head>
<body>
	<div class="wrapper">
	    <h1>Our website is currently down for scheduled maintenance</h1>
	    <p>We are currently performing scheduled maintenance on our website and will be back shortly.</p>
	    <p>Please check back later, or you can hang around and wait for us to come back online.
	    	We'll automagically refresh your browser once a minute so you don't have to keep checking.</p>
	</div>
</body>
</html>

<?php
die();
?>
