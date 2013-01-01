#!/bin/bash

pushd $(dirname $0) >/dev/null

pushd .. >/dev/null
git pull 
git submodule update
popd >/dev/null

popd >/dev/null
