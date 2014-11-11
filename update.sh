#!/bin/bash
ip="192.168.1.109"
scp -r system/ application/  root@$ip:/www/pages/
