<?php
ini_set('display_errors', 1);
try {

$db = new PDO('sqlite:/root/PythonScripts/PoCDB.db');

$hosts = $db->query('Select * from ipv6_hosts');

echo "<table class='default'>
	 <thead>
            <tr>
 		<th>NO</th>
 		<th>IPv6 Address</th>
		<th></th>
	    </tr>
	</thead>";


foreach ($hosts as $host)
{
	$id = $host['id'];
	$ip6 = $host['ipv6_address'];
	$attackFlag = $host['fakeRAStatus'];
	
	echo "<tr>
		  <td>$id</td>
		  <td>$ip6</td>";
	
	if($attackFlag == 0)
	{
             echo "<td>
		      <svg height='30' width='70'>
		        <circle cx='40' cy='20' r='10' stroke='black' stroke-width='1' fill='white' id='circle'/>
		      </svg>
		   </td>
	         </tr>";
	}
	else if($attackFlag == 1)
	{
	     echo "<td>
		     <svg height='30' width='70'>
		       <circle cx='40' cy='20' r='10' stroke='black' stroke-width='1' fill='red' id='circle'/>
		     </svg>
		   </td>
	         </tr>";	
	}
	else if($attackFlag == 2)
	{
	     echo "<td>
		      <svg height='30' width='70'>
		        <circle cx='40' cy='20' r='10' stroke='black' stroke-width='1' fill='green' id='circle'/>
		      </svg>
		    </td>
	         </tr>";
	}

}
echo "</table>";

$db = null;

}catch(PDOException $e){
	echo $e->getMessage();
}

?>
