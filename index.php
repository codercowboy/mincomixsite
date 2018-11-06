<?php include "comicslib.php"; ?>
<html>
<head>
<title>drawing salt</title>
<style>
	* { margin:0; padding:0; }
	BODY { text-align:center; margin-bottom:30px; }
	IMG { max-width:800px; }
	H1 { font-size:x-large; margin-top:10px; }
	H2 { font-size:x-small; margin-bottom:20px; }
	.links { display:block; margin-top:20px; }
</style>
</head>
<body>
	<h1>drawing salt</h1>
	<h2>comics for people having days</h2>	

	<img src="<?= $currentComicImage ?>"/>
	<div class="links">
		<a href="?comic=first">first</a>
		<a href="?comic=<?= $previousComicDate ?>">previous</a>
		<a href="?comic=<?= $nextComicDate ?>">next</a>
		<a href="?comic=last">last</a>
	</div>
</body>

</html>