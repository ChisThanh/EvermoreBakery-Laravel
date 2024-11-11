#!/bin/bash -x

pecl install xdebug-$XDEBUG_VERSION
mv /tmp/xdebug.ini /usr/local/etc/php/conf.d/