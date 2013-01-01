#!/bin/bash

pushd $(dirname $0) >/dev/null

pushd .. >/dev/null
git --no-pager log -n 15
popd >/dev/null

popd >/dev/null
