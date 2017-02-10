<!DOCTYPE html>
<html lang="en">
<head>
  <title>News API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<script>
function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      window.location="http://localhost/test/index.php";
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {window.location="http://localhost/test/index.php";
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '388805808152316',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
	<div class="container">
		<div class="jumbotron">
			<div class="row text-center">
				<div class="col-sm-6">
					<h1>News API</h1> 
					<p>Get news updates from NDTV</p>
				</div>
				<div class="col-sm-6">
					<a class="btn btn-danger" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
		<div class="well text-center">
			<?php
				include_once "db.php";
				$sql = "SELECT Keye FROM users WHERE ID=".$_SESSION['userID'];
				$res = mysqli_query( $db, $sql );

				if( !is_bool($res) )
				{
				while($array = mysqli_fetch_array($res))
				{
				echo '<h1>Key: </h1><p>'.$array['Keye'].'</p>';}}
			?>
			<h3>Generate api key</h3>
			<a class="btn btn-success" href="genkey.php">Generate API key</a>
		</div>
		<div class="well">
			<h3>How to use</h3>
			<a href="http://rohith.cloudapp.net/">Generate API key</a>
		</div>
	</div>

</body>
</html>