<?php
$config = array(
/**
 * Path where Opauth is accessed.
 *  - Begins and ends with /
 *  - eg. if Opauth is reached via http://example.org/auth/, path is '/auth/'
 *  - if Opauth is reached via http://auth.example.org/, path is '/'
 */
	'path' => '/auth/',

/**
 * Uncomment if you would like to view debug messages
 */
	//'debug' => true,
	
/**
 * Callback URL: redirected to after authentication, successful or otherwise
 */
	'callback_url' => '/callback.php',

/**
 * Callback transport, for sending of $auth response
 * - 'session': Default. Works best unless callback_url is on a different domain than Opauth
 * - 'post': Works cross-domain, but relies on availability of client-side JavaScript.
 * - 'get': Works cross-domain, but may be limited or corrupted by browser URL length limit (eg. IE8/IE9 has 2083-char limit)
 */
	//'callback_transport' => 'session',

/**
 * A random string used for signing of $auth response.
 */
	'security_salt' => 'xm6v0J6w36aCodSyKOJdPoin7BqDyYNKt0JDJl0EJdBPffzzUelxym0SsvvlPh3',
	
/**
 * Higher value, better security, slower hashing;
 * Lower value, lower security, faster hashing.
 */
	'security_iteration' => 276,
	
/**
 * Time limit for valid $auth response, starting from $auth response generation to validation.
 */
	//'security_timeout' => '2 minutes',
	
/**
 * Directory where Opauth strategies reside
 */
	'strategy_dir' => dirname(dirname(__FILE__)).'/Opauth/Strategy/',
	
/**
 * Strategy
 * Refer to individual strategy's documentation on configuration requirements.
 * 
 * eg.
 * 'Strategy' => array(
 * 
 *   'Facebook' => array(
 *      'app_id' => 'APP ID',
 *      'app_secret' => 'APP_SECRET'
 *    ),
 * 
 * )
 *
 */
	'Strategy' => array(
		// Define strategies and their respective configs here
		
		'Facebook' => array(
			'app_id' => '310666265660457',
			'app_secret' => 'd5ae2426e779931f3406d3da1212032d',
			'scope' => 'user_website'
		),
		
		'Twitter' => array(
			'key' => 'bc26uK84nZOh3NGakVdsuQ',
			'secret' => 'OjpNGqXtmTGvpqB1HmOcsEBMug0EsmcnDDnXL3RY',
		),
		
		'Google' => array(
			'client_id' => '790499350980.apps.googleusercontent.com',
			'client_secret' => '7H6oDnMvYPxMDjWgU3j_0p6A'
		),
		
		'Instagram' => array(
		  'client_id' => '425005b0bcce4680b91798001c8e8fd6',
		  'client_secret' => 'c66f97ecbf0e40e3a65bcdd81f786872',
		),
		
		'OpenID' => array(),
		
		'LinkedIn' => array(
			'api_key' => 'ky8vk69mmyqx',
			'secret_key' => 'z9RbOxWX640gfiBA'
		),
		
		'GitHub' => array(
			'client_id' => '3d049cd04eb813312c8e',
			'client_secret' => '5327ce15c3f89a897dc4dad25979b0aa9606127c'
		),
		
	),
);