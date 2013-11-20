<html>

<head>
	<title> Restriction Page </title>
	
	<script type="text/javascript">
		window.onload = function(){
			setTimeout(redirect, 2000);
		}

		var redirect = function(){
			var url = "<?php echo $login_url; ?>";
			window.location = url;
		}
		
	</script>
	
	<style>
		body{
			text-align: center;			
			margin-top: 10em;
		}
	</style>
	
</head>

<body>
	<p>Sorry! This is a memebers only site. You are now redirecting to the login page ....</p>
	<p> If your browser doesn't support javascript, <a href="<?php echo $login_url; ?>">click</a> here </p>
</body>

</html>