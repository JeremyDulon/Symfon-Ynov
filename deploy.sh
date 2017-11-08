#! /bin/bash

rm -r var/cache
mkdir var/cache
chown -R www-data:www-data var/cache
chmod -R 777 var/cache var/logs
chmod -R 777 var/cache var/logs
bin/console assets:install --symlink
chmod -R 777 var/cache var/logs
bin/console doctrine:cache:clear-metadata
bin/console doctrine:cache:clear-query
bin/console doctrine:cache:clear-result