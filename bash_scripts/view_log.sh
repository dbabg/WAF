#!/bin/bash

cat /var/log/httpd/access_log | cut -d\" -f1-3,10-15,16-25 |sort | uniq -c | sort -nr -s -k1,1 > log.txt
awk '{sub($1, "\"&\""); print}' log.txt > log1.txt
nl -n ln log1.txt | awk '{$1=$1};1' > log2.txt
awk '{sub($1, "\"&\""); print}' log2.txt  > log3.txt
cat log3.txt | cut -d\" -f2-23 > log4.txt
