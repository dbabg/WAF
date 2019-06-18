#!/bin/bash

systemctl reload httpd

tail /var/log/httpd/error_log
