#!/bin/sh

#Discover active IPv6 hosts on the network
atk6-alive6 -p -o /root/UsefulOutput/liveNode.txt eth1 > /root/Dummy/atk6-output

#Discover active IPv6 hosts cont'd
nmap -6 -n -script targets-ipv6-multicast-slaac --script-args 'interface=eth1,newtargets' -sP -oX /root/UsefulOutput/discoverLiveNodesXML > /root/Dummy/nmapHostDiscovery-output

#Parse nmap results and append list to liveNode.txt
python /root/PythonScripts/parseNmapTest.py

#Delete duplicate in file and save output in different file
awk '!seen[$0]++' /root/UsefulOutput/liveNode.txt > /root/UsefulOutput/liveNodes.txt

#Scan the live nodes for more information
nmap -6 -n -sV -O -iL /root/UsefulOutput/liveNodes.txt -oX /root/UsefulOutput/scanResultsXML -e eth1 > /root/Dummy/nmap-output


#Call the python script to parse nmap XML file and store data in DB
python /root/PythonScripts/parseNmap.py
