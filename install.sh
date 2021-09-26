#!/bin/bash

#default

## sed -i -e 's/abc/XYZ/g' /tmp/file.txt


mkdir bin
mkdir pub/media
mkdir src/App

cp base/docker-compose.yml docker-compose.yml
cp base/run.sh run.sh
cp base/ps.php bin/app.php
cp base/App.php src/App/App.php
cp base/routes.json src/App/routes.json
cp base/env.php src/etc/env.php

cp base/index.php pub/index.php
cp base/media/* pub/media/


if [ $# -eq 0 ]
  then
    echo "using default name: nfdefault"
  
  else

  	echo "using new name: $1"

    sed -i -e 's/nfdefault/$1/g' docker-compose.yml
    sed -i -e 's/nfdefault/$1/g' run.sh

    rm -rf docker-compose.yml-e
    rm -rf run.sh-e

fi



echo "NF PHP Base installed."
echo "Application Name: $1"
echo "See README.md for usage and setup details." 

echo "run \"docker-compose up -d\" to install dev env"
