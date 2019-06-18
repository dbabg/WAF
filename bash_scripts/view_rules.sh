#!/bin/bash

sed -n "/#rule 1/,//p" /etc/httpd/conf/httpd.conf  > /var/www/html/admin/rules.txt

cat /var/www/html/admin/rules.txt
