#!/bin/sh


#Discover active IPv6 hosts on the network and scan them for more information
nmap -6 -n -script targets-ipv6-multicast-slaac --script-args 'interface=eth1,newtargets' -sP -sV -O -oX /root/UsefulOutput/scanResultsXML > /root/Dummy/nmap-output


#Call the python script to parse nmap XML file and store data in DB
python /root/PythonScripts/parseNmap.py
