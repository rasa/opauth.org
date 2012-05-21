<?php
/**
 * Callback for Opauth
 * 
 * This file (callback.php) provides an example on how to properly receive auth response of Opauth.
 * 
 * Basic steps:
 * 1. Fetch auth response based on callback transport parameter in config.
 * 2. Validate auth response
 * 3. Once auth response is validated, your PHP app should then work on the auth response 
 *    (eg. registers or logs user in to your site, save auth data onto database, etc.)
 * 
 */


/**
 * Define paths
 */
define('OPAUTH_EXAMPLE', dirname(__FILE__).'/auth/');
define('OPAUTH_LIB', dirname(OPAUTH_EXAMPLE).'/Opauth/Core/lib/Opauth/');

/**
* Load config
*/
if (!file_exists(OPAUTH_EXAMPLE.'opauth.conf.php')){
	trigger_error('Config file missing at '.OPAUTH_EXAMPLE.'opauth.conf.php', E_USER_ERROR);
	exit();
}
require OPAUTH_EXAMPLE.'opauth.conf.php';

/**
 * Instantiate Opauth with the loaded config but not run automatically
 */
require OPAUTH_LIB.'Opauth.php';
$Opauth = new Opauth( $config, false );

	
/**
* Fetch auth, based on transport configuration for callback
*/
$response = null;
$error = null;

switch($Opauth->env['callback_transport']){	
	case 'session':
		session_start();
		$response = $_SESSION['opauth'];
		unset($_SESSION['opauth']);
		break;
	case 'post':
		$response = unserialize(base64_decode( $_POST['opauth'] ));
		break;
	case 'get':
		$response = unserialize(base64_decode( $_GET['opauth'] ));
		break;
	default:
		$error = '<strong style="color: red;">Error: </strong>Unsupported callback_transport.'."<br>\n";
		break;
}

/**
 * Check if it's an error callback
 */
if (array_key_exists('error', $response)){
	$error = '<strong style="color: red;">Authentication error: </strong> Opauth returns error auth response.'."<br>\n";
}

/**
 * No it isn't. Proceed with auth validation
 */
else{
	if (empty($response['auth']) || empty($response['timestamp']) || empty($response['signature']) || empty($response['auth']['provider']) || empty($response['auth']['uid'])){
		$error = '<strong style="color: red;">Invalid auth response: </strong>Missing key auth response components.'."<br>\n";
	}
	elseif (!$Opauth->validate(sha1(print_r($response['auth'], true)), $response['timestamp'], $response['signature'], $reason)){
		$error = '<strong style="color: red;">Invalid auth response: </strong>'.$reason.".<br>\n";
	}
	else{
		//$error = '<strong style="color: green;">OK: </strong>Auth response is validated.'."<br>\n";

		/**
		 * It's all good. Go ahead with your application-specific authentication logic
		 */
	}
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>Opauth – Multi-provider authentication framework for PHP</title>

    <link rel="stylesheet" href="stylesheets/opauth.css">
    <script src="javascripts/scale.fix.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="wrapper">
      <header>
        <h1>Opauth</h1>
        <p>Multi-provider authentication framework for PHP</p>
<!--
        <p class="view"><a href="https://github.com/uzyn/opauth.org">View the Project on GitHub <small>uzyn/opauth.org</small></a></p>
        <ul>
          <li><a href="https://github.com/uzyn/opauth.org/zipball/master">Download <strong>ZIP File</strong></a></li>
          <li><a href="https://github.com/uzyn/opauth.org/tarball/master">Download <strong>TAR Ball</strong></a></li>
          <li><a href="https://github.com/uzyn/opauth.org">View On <strong>GitHub</strong></a></li>
        </ul>
-->
      </header>
      <section>
			<h2>Authentication sucessful</h2>
			
			<p>Returned auth response:</p>
			
			<pre><code>
				<?php print_r($response); ?>
			</code></pre>
      </section>
    </div>
    <footer>
      <p>Copyright © 2012 <a href="http://uzyn.com">U-Zyn Chua</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   Opauth is released under the MIT License.</p>
      <p>Theme by <a href="https://github.com/orderedlist">orderedlist</a></p>
    </footer>
    <!--[if !IE]><script>fixScale(document);</script><!--<![endif]-->
              <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
          </script>
          <script type="text/javascript">
            try {
              var pageTracker = _gat._getTracker("UA-31914008-1");
            pageTracker._trackPageview();
            } catch(err) {}
          </script>

<a href="https://github.com/uzyn/opauth"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png" alt="Fork me on GitHub"></a>

  </body>
</html>