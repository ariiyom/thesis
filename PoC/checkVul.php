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
					
				<div id="divAttackList">
				    <h3>List of attacks present</h3>
					
					<ul class="bulletList">
			   	           <li><a href="#" onclick="test();">Fake Router Advertisement Attack</a>
					   </li>
					</ul>
			    	     <div id="reportRA"></div>				
				</div>

				
				

				<div id="myModal" class="modal">
		    		    <div class="modal-content">
	               		       <span class="close">&times;</span>
					<input id ="buttonLaunch" type="button" onclick="showAttackLoader();" style="display:block;margin:auto;" value="Launch Attack"></input>

				<!--Show Loader on buttonclick-->
					<div id="attackLoader" style="display:none;margin:auto;"></div>
					<div id="attackComplete" style="display:none;margin:auto;">Attack Complete!</div> 

		       			 <div id="warningText">

					   <p id="infoImg"><a href=""><img height=25 width=25 src="assets/images/info.png"><span>Green = Attack Failed<br>Red = Attack Successful</span></a></p>
 
					</div>


		       		   <div id="myModalContent"><br></div>
		                </div>
	
			 </div> <!--close div class inner-->
		</div> <!--close div id header-->
					 	
					
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
			function test()
			{
				var modal = document.getElementById('myModal');
				var complete = document.getElementById('attackComplete');
				
				// Get the <span> element that closes the modal
				var span = document.getElementsByClassName("close")[0];
				modal.style.display="block";	
	
				// When the user clicks on <span> (x), close the modal
				span.onclick = function() 
				{
    					modal.style.display = "none";
					complete.style.display = "none";
					document.getElementById('buttonLaunch').style.display = "block";
					
					var ur ="updateDBAfterRA.php";
					$.post(ur);

					var ur2 ="getReport.php";
					$.post(ur2, function(data2){
						$("#reportRA").append(data2);
						});

				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
    					if (event.target == modal) {
        					modal.style.display = "none";
    					}
				}
				var url="getHostsListBulb.php";
  				    $.post(url, function(data){
					   $("#myModalContent").html(data);
				         });		
			}
			</script>

			<script>
			function showAttackLoader()
			{
				var buttonLaunch = document.getElementById('buttonLaunch');
				var attackLoader = document.getElementById('attackLoader');
				
				buttonLaunch.style.display = "none";
				attackLoader.style.display = "block";

				var url = "launchFakeRA.php";
				$.post(url, function(data){scan();});
				
			}
			function scan()
			{
				var timer;
				timer = setTimeout(showOutput, 3000);	
			}
			function showOutput()
			{
				document.getElementById('attackLoader').style.display = "none";
				document.getElementById('attackComplete').style.display = "block";

				var url2 = "getHostsListBulb.php";
				$.post(url2, function(data2){$("#myModalContent").html(data2);});
				

			}
			</script>


	</body>
</html>
