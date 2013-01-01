#!/bin/bash

pushd $(dirname $0) >/dev/null

DB_NAME=`php get-wp-config.php DB_NAME`
DB_USER=`php get-wp-config.php DB_USER`
DB_PASSWORD=`php get-wp-config.php DB_PASSWORD`
DB_HOST=`php get-wp-config.php DB_HOST`

BACKUP_SRC_DIR="../backup/src"
SQL_DUMP_FILENAME="${BACKUP_SRC_DIR}/${DB_NAME}.sql"

mysql -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME < $SQL_DUMP_FILENAME

popd >/dev/null

