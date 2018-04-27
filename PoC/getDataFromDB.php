<?php
ini_set('display_errors', 1);
try {

$db = new PDO('sqlite:/root/PythonScripts/PoCDB.db');

$hosts = $db->query('Select * from ipv6_hosts');

echo "<table class='default'>
	 <caption>Scan Results</caption>
	 <thead>
            <tr>
 		<th>NO</th>
 		<th>IPv6 Address</th>
		<th>Mac Address</th>
		<th>OS Info</th>
		<th>Vendor</th>
		<th>Ports and Services</th>
	    </tr>
	</thead>";


foreach ($hosts as $host)
{
	/*echo $host['ipv6_address'];
	$message = $host['ipv6_address'];
	echo "<script type='text/javascript'> alert('$message');</script>"; */

	$id = $host['id'];
	$ip6 = $host['ipv6_address'];
	$mac = $host['mac_address'];
	$os = $host['os_info'];
	$vendor = $host['vendor'];
	
	echo "<tr>
		  <td>$id</td>
		  <td>$ip6</td>
		  <td>$mac</td>
		  <td>$os</td>
		  <td>$vendor</td>
		  <td>
  <table>
	      ";

	$ports = $db->query("Select * from ports_and_services where ipv6_Hosts_id=".$id);

	foreach($ports as $port)
	{
		$portNo = $port['port_number'];
		$proto = $port['protocol'];
		$service = $port['service'];
		$serviceName = $port['service_name'];
		$version = $port['version'];


		echo "<tr>
 			<td>$portNo</td>
			<td>$proto</td>
			<td>$service</td>
			<td>$serviceName</td>
			<td>$version</td>
		     </tr>";
	
	}
	echo "</table>
 
             </td>
	     </tr>";


}
echo "</table>";

$db = null;

}catch(PDOException $e){
	echo $e->getMessage();
}

?>
