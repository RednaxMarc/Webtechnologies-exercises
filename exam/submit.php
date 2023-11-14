<!DOCTYPE html>
<html lang="en">
<head>
	<title>Submit - DNA visualiser</title>
	<style type="text/css" media="screen">
		.inputwrap {
		margin-left: 28px;
		margin-top: 5px;
		margin-bottom:5px;
		}
		textarea {
		height: 50em;
		width: 80em;}
		.content {
		padding: 10px 20px;}
	</style>
</head>
<body>
<?php
$header="Submit some (multi)Fasta to visualise";
    include('navbar.php');

?>
 <div class="contentbox">
	<div class="header">
	<?php
	    echo"$header"
	?>
	</div>
	<div class="content">
	
	<br>
	<div><b>Input:</b></div>
	<form action="visualise.php" method="POST" enctype="multipart/form-data">
		<div>
		<label>
			<input type="radio" name="uploadtype" value="file">
			Upload a (multi)fasta file :
		</label>
		<div class="inputwrap">
		<input type="file" name="filename" value="">
		</div>
		</div>
	
		<div>
		<label>
			<input type="radio" name="uploadtype" value="paste">
			paste some (multi)fasta sequences
		</label>
		<div class="inputwrap">
			<textarea name="fastapaste"></textarea>
		</div>
		</div>
	
	<br>	
	<div><b>Output:</b></div>
	<div>
		Please specifiy the number of nucleotides that should be printed per line:
		</div>
		<div>
		<input type="number" name="nperl" value="72">
		</div>
		<div>
			<input type="checkbox" name="check12" value="on">
			Group nucleotides by 12.
	</div>
	<br>
	<div><b>Colors:</b></div>
	<div>
		<input type="checkbox" name="checkcolor" value="on">
		All nucleotides should receive a different background color.
	</div>
	
	<br>
	<div><b>RNA</b></div>
	<div>
		<input type="checkbox" name="makerna" value="on">
		The sequence should be transcribed to RNA
	</div>
	
	<br>
	<div><b>Errors:</b></div>
	<div>Please specify how to handle invalid nucleotides:</div>
	<div><label>
		<input type="radio" name="error" value="one">
		Remove the invalid nucleotides from the output.
		</label>
	</div>
	<div><label>
		<input type="radio" name="error" value="two">
		Highlight the invalid nucleotides.
		</label>
	</div>
	<br>
	<br>
	<input type="submit" name="submit" value="Visualise Sequences">
	
	</form>
	</div>
     </div>

<?php

    include('navbar.php');

?>
</body>
</html>
