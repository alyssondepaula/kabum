<?php

$pathInPieces = explode('/', $_SERVER['DOCUMENT_ROOT']);
echo $pathInPieces[0];

define("ROOT", $pathInPieces[0]);
define("DIR", ROOT);
define("AUTOLOAD", ROOT.'/vendor/autoload.php');
define("UTILS", ROOT.'/src/Utils');
define("COMPONENTS", ROOT.'/src/components/');

?>