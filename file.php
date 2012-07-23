<?php
/**
 * Redirect to the latest Opauth downloads on GitHub
 */
switch (strtolower(trim($_GET['name']))) {
    case 'opauth-core.zip':
    case 'core':
        header('Location: https://github.com/downloads/uzyn/opauth/Opauth-core-0.4.1.zip');
        break;
        
    case 'opauth-bundled-example.zip':
    default:
        header('Location: https://github.com/downloads/uzyn/opauth/Opauth-bundled-example-0.4.1.zip');
}
exit();