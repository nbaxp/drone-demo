<?php 
require "vendor/autoload.php";

use Root\App\HelloWorld;
$entry = new HelloWorld();
echo($entry->printHelloWorld());
?>

