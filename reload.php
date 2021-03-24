<?php
	function failed($message) {  
		echo "<div class='red'>Failure: Nginx did not pass its config test<br /><br />Error Message: $message <br /> <br />Please check the file and try again.</div>";	
	};
	function success($message) {
		exec("sudo /usr/sbin/nginx -s reload");
		echo "<div class='green'>Success: Nginx test passed<br /> <br /> Status Message: $message <br /> <br />Nginx has reloaded the configuration.</div>";
		};
	
    exec("sudo /usr/sbin/nginx -t 2> /var/www/html/nginx/nginx-sample");
	$samplefile = fopen("nginx-sample","r"); 
	$sample = fread($samplefile,filesize("nginx-sample")); 
	fclose($samplefile); 
	$controlfile = fopen("nginx-file","r"); 
	$control = fread($controlfile,filesize("nginx-file")); 
	fclose($controlfile); 
		
	if ( strcmp($sample,$control ) !== 0 ) { 
		    failed($sample);
		} else { 
		    success($sample);
		}