<?php

define("LOAD_WP", false);
require_once("../wp-config.php");

echo constant($argv[1]);

?>
