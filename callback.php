<?php
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
		// It's all good
		$error = null;
	}
}
?>

<?php require('includes/head.php'); ?>
<?php if (is_null($error)): ?>
<?php $auth = $response['auth']; ?>
	<h2>Authentication sucessful</h2>
	
	<p>Authentication is successful and auth response is <span style="color: green; font-weight: bold;">validated</span>.</p>

	<p>Returned auth response:</p>
	
	<table class="auth-response">
	<tr>
		<th>Key</th>
		<th>Value</th>
	</tr>
	<tr>
		<th>Provider</th>
	    <td><?php echo $auth['provider']; ?></td>
	</tr>
	<tr>
		<th>User&nbsp;ID</th>
	    <td><?php echo $auth['uid']; ?></td>
	</tr>
	<tr>
		<th>User info</th>
	    <td>
			<ul>
			<?php foreach ($auth['info'] as $key=>$value): ?>
				<?php if ($key == 'image') $value = '<img src="'.$value.'" class="auth-response-image" title="'.$value.'" alt="User image">'; ?>
				<?php if (is_array($value)) $value = print_r($value, true); ?>
				<li><?php echo "<strong>$key</strong>: $value"; ?></li>
			<?php endforeach; ?>
			</ul>
		</td>
	</tr>
	<tr>
		<th>Credentials</th>
	    <td>
			<?php if (count($auth['credentials']) > 0): ?>
			<ul>
			<?php foreach ($auth['credentials'] as $key=>$value): ?>
				<?php if (is_array($value)) $value = print_r($value, true); ?>
				<li><?php echo "<strong>$key</strong>: $value"; ?></li>
			<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<th>Timestamp</th>
	    <td><?php echo $response['timestamp']; ?></td>
	</tr>
	<tr>
		<th>Signature</th>
	    <td><?php echo $response['signature']; ?></td>
	</tr>
	<tr>
		<th>Raw</th>
	    <td>
  			<textarea><?php print_r($auth['raw']); ?></textarea>
	    </td>
	</tr>
	</table>

	<h2>Raw response</h2>

	<a href="#" onclick="document.getElementById('actual-response').style.display = 'block'; this.style.display = 'none'; return false;">View</a>
	<div id="actual-response" style="display: none;">
		<pre><code>
		<?php print_r($response); ?>
		</code></pre>
	</div>
	
<?php else: ?>
	<h2>Authentication error</h2>
	
	<p><?php echo $error; ?></p>
	
	<p>Returned auth response:</p>

	<pre><code>
	<?php print_r($response); ?>
	</code></pre>
<?php endif; ?>

<?php require('includes/foot.php'); ?>