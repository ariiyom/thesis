<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Gabriella</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	
		<style>
ul#Navigation .active{
       border-color: white;
    border-left-color: black; 
    border-top-color: black;
    color: black;
    background-color: yellow;
}
</style>

	</head>
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Inner -->
						<div class="inner">
							<header>
						<div id="start" style="display:block;" >
		<hr/>
								<p>This page will let you find out whether or not</br> there are any live IPv6 nodes present in the network.</p>
								<hr/>

						   </div>
                      <div id="loader" style="display:none;" >
                      
                      
							                  
                      </div>
                      
                        <div id="loadertext" style="display:none;" >
                      <br>
                      <br>
 							 <br>
                      <br>
 							 <br>
                       <br>
                      Please hold on while the network is being scanned...
							                  
                      </div>
 
  <!--/*function runAutomaticNmap(){

          $old_path = getcwd();
	
  chdir('/root/BashScripts/');
	shell_exec('sudo -S ./AutomaticNmapScan.sh');
chdir($old_path);
}-->

        

									<div style="display:none;" id="myDiv"><!-- Scan Results are displayed here from getDataFromDB.php -->
									</div>
							</header>
							<footer>
								<div id="buttonScan" style="display:block;margin:auto;">
								<a href="javascript:void(0)" onclick="disable();" class="button circled scrolly">Scan</a>
</div>
							</footer>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul id="Navigation">
								<li><a href="index.html" class="active">Home</a></li>
								<li><a href="device.php">Devices</a></li>
							        <li><a href="checkVul.php">Check Vulnerabilities</a></li>
							</ul>
						</nav>

				</div>

			<!-- Banner -->
		

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
                         <script>
		          	var myVar;
                                function disable()  {
	       				document.getElementById("start").style.display = "none";
  					document.getElementById("buttonScan").style.display = "none";
					document.getElementById("loader").style.display = "block";
  			 document.getElementById("loadertext").style.display = "block";				
			                var url="scan.php";
  
                                        $.post(url, function(data){
						scan();	
					       });
							
				}			        
  	
    				function scan(){
	       				myVar = setTimeout(showPage, 3000);

				}
				function showPage() 
				{
				     var url2="getDataFromDB.php";
  
                                        $.post(url2, function(data2){
					         $("#myDiv").html(data2);
					      });
                                        
  					document.getElementById("loader").style.display = "none";
  					document.getElementById("loadertext").style.display = "none";
  					document.getElementById("myDiv").style.display = "block";
				}
				

				
                       </script>

	</body>
</html>
