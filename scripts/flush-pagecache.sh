#!/bin/bash

pushd $(dirname $0) >/dev/null

CACHE_FLUSH_URL=`php get-wp-config.php WP_HOME`/scripts/flush-pagecache.php
curl $CACHE_FLUSH_URL  

popd >/dev/null

