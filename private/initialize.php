<?php
ob_start();
// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
//define("PRIVATE_PATH", $_SERVER['DOCUMENT_ROOT'] . '/private');
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');
// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
// $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
// $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);
// define("WWW_ROOT", $doc_root);
?>
<?php
require_once(PRIVATE_PATH . '/functions.php');
require_once(PRIVATE_PATH . '/database.php');
require_once(PRIVATE_PATH . '/validation_functions.php');
require_once(PRIVATE_PATH . '/query_functions.php');

$db = connect_to_db();
$errors = [];
?>