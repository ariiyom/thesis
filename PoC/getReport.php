<?php
ini_set('display_errors', 1);
try {

$db = new PDO('sqlite:/root/PythonScripts/PoCDB.db');

$hosts = $db->query('Select fakeRAStatus from ipv6_hosts where fakeRAStatus = 1');

$rows = $hosts->fetchAll();

if(count($rows) >=1)
{
  $rptRA = $db->query('Select report_path, date from Reports where attack = "fakeRA" order by datetime(date) desc limit 1');
 
    foreach($rptRA as $rpt)
    {  
	$reportLink = $rpt['report_path'];
  	$currentDate = $rpt['date'];
    }
  /*echo $reportLink;
  echo $currentDate;*/


  echo "<a href={$reportLink} style='display:block;'download>[ Report: {$currentDate} ]</a>";
}


$db = null;

}catch(PDOException $e){
	echo $e->getMessage();
}

?>
