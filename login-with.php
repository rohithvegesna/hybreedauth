<?php
error_reporting(0);
	session_start();
	include('config.php');
	include('hybridauth/Hybrid/Auth.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
	<h1>Weather report</h1> 
	<p>Get weather report from you city</p> 
    <?php
	if(isset($_GET['provider']))
        {
        	$provider = $_GET['provider'];
        	
        	try{
        	
        	$hybridauth = new Hybrid_Auth( $config );
        	
        	$authProvider = $hybridauth->authenticate($provider);

	        $user_profile = $authProvider->getUserProfile();
	        
			if($user_profile && isset($user_profile->identifier))
	        {
				echo "<b>Name</b> :".$user_profile->displayName."<br />";
				echo "<img style='width: 10%' src='".$user_profile->photoURL."'/><br />";
				echo "<br /><a class='btn btn-danger' href='logout.php'>Logout</a>";
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
  </div>
<form action="<?php echo $_SERVER[REQUEST_URI];?>" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="area" placeholder="City name">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<?php
if($_POST['area'] == null){
 echo "<h1>Please enter area name above</h1>";
}
else{
 //get JSON
 $json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?APPID=2b21aaa84d62d7ab4f94be17cbcee305&q='.$_POST['area']);

 //decode JSON to array
 $data = json_decode($json,true);

 //description
 echo '<h1>Place: '.$data['name'].'</h1>';
 echo '<h1>Sky: '.$data['weather'][0]['description'].'</h1>';
 echo '<h1>Temperature: '.$data['main']['temp'].'</h1>';
 echo '<h1>Sky: '.$data['wind']['speed'].'</h1>';
}

?> 
</div>

</body>
</html>