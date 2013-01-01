#!/bin/bash

pushd $(dirname $0) >/dev/null

cd ..
git submodule init
git submodule update

popd >/dev/null
