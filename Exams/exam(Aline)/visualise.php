<!DOCTYPE html>
<html lang="en">
<head>
	<title>Visualise - DNA visualiser</title>
	<style type="text/css" media="screen">
		.errors {
		background: darkred;
		font-weight: bold;
		color: white;
		border: white 2px solid;
		box-sizing: content-box;
		outline: darkred 2px solid;
		padding: 10px 3em;
		margin-bottom: 1em;}
		.A {
		background: darkorange;}
		.T {
		background: yellow;}
		.C {
		background: lightgreen;}
		.G {
		background: lightblue;}
		.nothing {
		background: white;}
		.titles {
		background: white;
		font-weight: bold;}
		.content {
		padding: 10px 20px;}
	</style>
</head>
<body>
<?php
$header="Visualise Sequences";
   include('navbar.php');
   
?>
   <div class="contentbox">
	<div class="header">
	<?php
	    echo"$header"
	?>
	</div>
	<div class="content">
	<?php
	 
	   
	if (!isset($_POST['submit'])) {
		 echo"<div class=\"errors\">The page is accessed without sending any data.</div>";
		echo"<p>Please correct the issues and resubmit the <a href=\"submit.php\">form</a></p>"; 
	}
	elseif (!isset($_POST['uploadtype']) or empty($_POST['fastapaste']) and empty($_FILES['filename']['tmp_name']) or !isset($_POST['error'])) {
	if (!isset($_POST['uploadtype'])) {
	   	 echo"<div class=\"errors\">No sequence upload method was picked.</div>";
	}    
	elseif (empty($_POST['fastapaste']) and empty($_FILES['filename']['tmp_name'])) {
		echo"<div class=\"errors\">An upload type was picked, but no fasta was received. (Empty file or empty paste field).</div>";
	}
	if (!isset($_POST['error'])) {
	    	echo"<div class=\"errors\">No error handling option was picked.</div>";
	}
	echo"<p>Please correct the issues and resubmit the <a href=\"submit.php\">form</a></p>";
	}
	
	
	else {
	
	
	    if (isset($_POST['submit'])) {
	    $fastalines=[];
	    	if ($_POST['uploadtype']== 'paste') {
	    	    $fastalines=explode("\n", $_POST['fastapaste']);
	    	}
	    	
	    	elseif ($_POST['uploadtype']== 'file') {
	    	$fastalines= file($_FILES['filename']['tmp_name']);
	    	    }
	    	}
	   	
	    	
	    
	    	$totcount=[];
	    	echo"<pre>";
	    	foreach ($fastalines as $line) {
	    	$line= trim($line);
	    	if (str_starts_with($line, ">")) {
	    		$curseq=$line;
	    		$totcount[$curseq]=0;
	    		echo"<br>";
	    	    echo"<br>";
	    	    echo"<b><span class=\"titles\">$line</span></b>";
	    	    echo"<br>";
	    	    
	    	 
	    	    continue; 
	    	}
	    	$nts= str_split($line);
	    	foreach ($nts as $nt) {
	    	$totcount[$curseq]++;
	if (!$_POST['makerna']=="on") {    	
		if ($nt=="A" or $nt=="T" or $nt=="G" or $nt=="C") {
			    if ($_POST['checkcolor']=="on") {
	    		    echo"<span class=$nt>$nt<span>";
	    			}
	       		    if (!$_POST['checkcolor']=="on") {
	    	            echo"$nt";
	    		        }
		}
		
		elseif ($nt!=="A" or $nt!=="T" or $nt!=="G" or $nt!=="C") {
			    if ($_POST['error']=="one") {
		            echo"";
		            $totcount[$curseq]--;
		             }
		    	    elseif ($_POST['error']=="two"){
		    	    echo"<span style=\"background: darkred; color: white;\">$nt</span>";
		            }
	    	   }
	} 
	elseif ($_POST['makerna']=="on") {    	
		if ($nt=="A" or $nt=="T" or $nt=="G" or $nt=="C") {
			    if ($_POST['checkcolor']=="on") {
			  	if ($nt=="T") {
			       	  echo"<span class=$nt>U<span>";
			    	  }
	    		    	else {
	    		    	  echo"<span class=$nt>$nt<span>";
	    		    	  }
	    		     }
	       		    if (!$_POST['checkcolor']=="on") {
	       		    if ($nt=="T") {
	       		    echo"U";}
	    	            else {echo"$nt";}
	    		        }
		}
		
		elseif ($nt!=="A" or $nt!=="T" or $nt!=="G" or $nt!=="C") {
			    if ($_POST['error']=="one") {
		            echo"";
		            $totcount[$curseq]--;
		             }
		    	    elseif ($_POST['error']=="two"){
		    	    echo"<span style=\"background: darkred; color: white;\">$nt</span>";
		            }
	    	   }
	} 
	

	    	if($_POST['check12']=="on"){
	    	if ($totcount[$curseq]!==0) {
	    	if ($totcount[$curseq]%12==0) {
	    	     echo"<span class=\"nothing\"> </span>";
	    	}}
	    	}
	    	if ($totcount[$curseq]!==0) {
	    	    	if ($totcount[$curseq]%$_POST['nperl']==0) {
	    	     echo"<span class=\"nothing\">\n</span>";
	    	}
	    	}
	    
	    	   }
	    	}
	    	echo"</pre>";
	}
	?>
	</div>
     </div>


<?php
   include('navbar.php');
?>
</body>
</html>
