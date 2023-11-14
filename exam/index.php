<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome - DNA visualiser</title>
	<style type="text/css" media="screen">
		
		img {
		float: right;
		margin: 1em;}
		.t120 {
		font-size: 120%;}
		.content {
		padding: 60px 30px;}
	</style>
	
</head>
<body>

<?php
$header="Welcome to the DNA visualiser";
   include('navbar.php');
   
?>
   <div class="contentbox">
	<div class="header">
	<?php
	    echo"$header"
	?>
	</div>
	<div class="content">

   	<img src="screenshot.png" alt="Example-img"  width="500px">
   	
   	<div class="t120">
   	This application ingest multifasta DNA sequences and displays the nucleotides nicely formatted.
   	</div>
   	<p>The user can upload multifasta sequences in two ways:</p>
	<ol>
    		<li>Upload a multifasta file.</li>
    		<li>Paste multifasta sequences in the provided input field.</li>
	</ol>
	<p>The user is in control of the output and can define:</p>
	<ol>
     		<li>the number of nucleotides allowed per line</li>
     		<li>if nucleotides should be grouped by 12</li>
     		<li>if all nucleotides should receive a different background color.</li>
	</ol>
	<p>The application is also able to output RNA instead of DNA.</p>
	<p>Invalid input - nucleotides different from ATGC – is also handled. The options are:</p>
	<ul>
     <li>Highlight the invalid nucleotides</li>
     <li>Remove the nucleotides from the generated output</li> 
   	</ul>
   	<p>But enough talk, <a href="submit.php">let's generate some complements!</a></p>
	</div>
	
     </div>


<?php
   include('navbar.php');
?>

</body>
</html>
