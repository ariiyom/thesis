<?php
 
          $old_path = getcwd();
	
         chdir('/root/BashScripts/');
	 shell_exec('sudo -S ./updateDBAfterRA.sh');
         chdir($old_path);

?>

