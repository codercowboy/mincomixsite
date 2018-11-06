<?php include "comicslib.php"; ?>
<html>
<head>
<title>Drawing Salt.</title>
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

	<img src="<?php echo $currentComic; ?>"/>
	<div class="links">
		<a href="?comic=first">first</a>
		<a href="?comic=<?php echo $previousComicIndex; ?>">previous</a>
		<a href="?comic=<?php echo $nextComicIndex; ?>">next</a>
		<a href="?comic=last">last</a>
	</div>
</body>

</html>