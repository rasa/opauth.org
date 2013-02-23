<?php
/**
 * Redirect to the latest Opauth downloads on GitHub
 */
switch (strtolower(trim($_GET['name']))) {
	case 'opauth-cakephp-sample-app.zip':
        header('Location: https://github.com/downloads/uzyn/cakephp-opauth/Opauth-CakePHP-sample-app-0.4.1.zip');
        break;

   case 'opauth-cakephp-plugin.zip':
        header('Location: https://github.com/downloads/uzyn/cakephp-opauth/Opauth-CakePHP-plugin-0.4.1.zip');
        break;

    case 'opauth-core.zip':
    case 'core':
        header('Location: https://github.com/downloads/opauth/opauth/Opauth-core-0.4.1.zip');
        break;
        
    case 'opauth-bundled-example.zip':
    default:
        header('Location: https://github.com/downloads/opauth/opauth/Opauth-bundled-example-0.4.1.zip');
}
exit();