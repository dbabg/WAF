#!/bin/bash

grep -B10 "#rule 1" /etc/httpd/conf/httpd.conf | grep "Directory" |sed 's|[<>,]||g' | sed 's|["",]||g' > dir.txt
cat /var/www/html/admin/dir.txt
