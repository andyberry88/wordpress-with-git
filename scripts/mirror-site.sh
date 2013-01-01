#!/bin/bash

pushd $(dirname $0) >/dev/null

GENERATED_BACKUP_DIR="../backup/generated"
WGET_HOSTNAME=`php get-wp-config.php WP_HOME`
WGET_SERVER_NAME=`php get-wp-config.php WP_SERVER_NAME`

HOSTNAME_BACKUP_ROOT=$GENERATED_BACKUP_DIR/$WGET_SERVER_NAME
LOG_FILE=$GENERATED_BACKUP_DIR/$WGET_SERVER_NAME.log

[ -d $HOSTNAME_BACKUP_ROOT ] && rm -rf $HOSTNAME_BACKUP_ROOT
wget -R "*replytocom=" -m $WGET_HOSTNAME --max-redirect=5 -P $GENERATED_BACKUP_DIR -o $LOG_FILE 

EXIT_CODE=$?
if [ $EXIT_CODE -gt 0 ]; then
    echo "Broken link(s):" >&2
    echo "" >&2
    grep -B 2 '404' $LOG_FILE >&2
    grep "" >&2
    grep "" >&2
    grep "Invalid redirect(s):" >&2
    echo "" >&2
    grep -B 4 'redirections exceeded' $LOG_FILE >&2
    echo "" >&2
fi

popd >/dev/null

