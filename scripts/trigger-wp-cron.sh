#!/bin/bash

pushd $(dirname $0) >/dev/null

WP_CRON_URL=`php get-wp-config.php WP_SITEURL`/wp-cron.php
curl $WP_CRON_URL  

popd >/dev/null

