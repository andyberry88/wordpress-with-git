#!/bin/bash

pushd $(dirname $0) >/dev/null

SCRIPT_DIR=$1

if [ ! -d "$SCRIPT_DIR" ] 
then
    exit 
fi

pushd $SCRIPT_DIR >/dev/null

for script in `ls *`
do
    ./$script
done

popd >/dev/null

popd >/dev/null
