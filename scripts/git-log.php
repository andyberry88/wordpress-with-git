<?php
	$output = `./git-log.sh 2>&1`;
	echo "<pre>$output</pre>";
	$output = `./flush-pagecache.sh 2>&1`;
	echo "<pre>$output</pre>";
?>