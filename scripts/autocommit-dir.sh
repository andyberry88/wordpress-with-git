#!/bin/bash

#DRY_RUN="--dry-run"

COMMIT_DIR=$1
pushd $COMMIT_DIR >/dev/null

git add -A
git commit -m "auto commit of $(basename `pwd`) at `date`" $DRY_RUN
git push -q origin master $DRY_RUN

popd >/dev/null
