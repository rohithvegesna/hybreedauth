<?php
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "http://rohith.cloudapp.net/hybridauth/index.php", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "854572292884-97nmaun54e8252v94qitem7pnlbe49e4.apps.googleusercontent.com", "secret" => "6FGnZ7J5RMNzp40Q7isLgP2z" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "388805808152316", "secret" => "c22f2bbd8dfb70c6ea615aeb4d53fd13" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "J2U5rD3ouy7F9Qhvaks6J1pIb", "secret" => "WITHhPozVy575ysGMnWseUhDApOraf10LIc85MpVZ1K44hZzVV" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
