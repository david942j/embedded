#!/bin/bash
ip="192.168.1.113"
scp -r system/ application/ root@$ip:/www/pages/
