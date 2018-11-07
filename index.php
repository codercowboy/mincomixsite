<?php include "comicslib.php"; ?>
<html>
<head>
<title>drawing salt</title>
<style>
	* { margin:0; padding:0; -webkit-text-size-adjust:100%; font-family:Arial, Verdana, serif; }
	BODY { text-align:center; margin-bottom:30px; }
	IMG { max-width:800px; }
	.pageHeader { margin-left:auto; margin-right:auto; text-align:center; margin-bottom:30px; }
	.pageHeader H1 { font-size:6em; margin-top:10px; }
	.pageHeader H2 { font-size:2em; margin-bottom:20px; margin-top:10px; }
	.links { display:block; margin-top:30px; }
	.links A { width:75px; height:50px; background-color:black; color:white; display:inline-block;
		border-color:gray; text-decoration:none; margin:25px; font-size:2em; 
		font-weight:bold; padding-top:0.5em; }
	.links A:hover { color:gray; }
</style>
</head>
<body>
	<div class="pageHeader">
		<h1>drawing salt</h1>
		<h2>comics for people having days</h2>	
	</div>

	<img src="<?= $currentComicImage ?>"/>

	<div class="links">
		<a href="?comic=first">&lt;&nbsp;&lt;</a>
		<a href="?comic=<?= $previousComicDate ?>">&lt;</a>
		<a href="?comic=<?= $nextComicDate ?>">&gt;</a>
		<a href="?comic=last">&gt;&nbsp;&gt;</a>
	</div>
</body>

</html>