# thesis - PoC Prototype

All the revelant material needed to test this thesis' prototype is found here. The prototype is meant to be tested on a Kali Linux device.

The aim of this prototype is to assess an IPv4-only network to determine whether or not it is vulnerable to IPv6-specific attacks.

Specifically, the fake router advertisement attack is implemented to determine the presence (or absence) of NDP vulnerabilities.

Note: After all the material has been downloaded, do the following:

- move the PoC directory to /var/www/html
- move the directories (BashScripts, Dummy, PythonScripts, UsefulOutput) to /root
- make sure the interface connected to the internal network is eth1 (NB: can use eth0 but will have to change all parts of the code that use eth1 to eth0)
