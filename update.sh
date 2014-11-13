#!/bin/bash
ip="192.168.1.123"
scp -r system/ application/ .htaccess root@$ip:/www/pages/
