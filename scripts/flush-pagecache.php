<?php

define('W3TC_DIR', '../wp-content/plugins/w3-total-cache');
require_once W3TC_DIR.'/inc/define.php';
w3_load_plugins();
$w3_pgcache = & W3_PgCacheFlush::instance();
$w3_pgcache->flush();

?>