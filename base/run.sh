#!/bin/bash
[ -z "$1" ] && echo "Please specify a CLI command (ex. ls)" && exit
docker exec --user=root nfdefault_php-apache-nfdefault_1 $@
