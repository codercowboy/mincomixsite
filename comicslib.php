<?php

	function recursive_scan($directory) {
		$result = array();
		$filelist = scandir($directory);
		foreach ($filelist as $file) {
			if ("." == $file || ".." == $file) {
				continue;
			}
			$fullPath = $directory . "/" . $file;
			if (is_dir($fullPath)) {
				$foundFiles = recursive_scan($fullPath);
				$result = array_merge($result, $foundFiles);
			} else {
				array_push($result, $fullPath);
			}
		}
		return $result;
	}

	//from https://stackoverflow.com/questions/834303/startswith-and-endswith-functions-in-php
	function endsWith($needle, $haystack) {
		return preg_match('/' . preg_quote($needle, '/') . '$/', $haystack);
	}

	$files1 = recursive_scan("comics");
	$pattern = "/comics\\/\\d\\d\\d\\d\\d\\d\\d\\d\\/.*/";
	$comicImages = array();
	foreach ($files1 as $file) {
		if (!preg_match($pattern, $file) || (!endsWith("jpg", $file) && !endsWith("png", $file))) {
			//echo "skipping file: " . $file . "<br/>";
			continue;
		}			
		//echo $file . "<br/>";
		array_push($comicImages, $file);
	}

	$comicCount = count($comicImages);

	$currentComicIndex = $comicCount - 1;

	$urlParamIndex = isset($_GET["comic"]) ? $_GET["comic"] : NULL;

	//echo "url: " . $urlParamIndex . "<br/>";

	if ($urlParamIndex == "first") {
		$currentComicIndex = 0;
	} else if ($urlParamIndex == "last") {
		$currentComicIndex = $comicCount - 1;
	} else if (is_numeric($urlParamIndex)) {
		$intValue = $urlParamIndex + 0;
		if ($intValue < $comicCount) {
			$currentComicIndex = $intValue;
		}
	}

	$previousComicIndex = $currentComicIndex - 1;
	if ($previousComicIndex < 0) {
		$previousComicIndex = 0;
	}
	$nextComicIndex = $currentComicIndex + 1;
	if ($nextComicIndex > ($comicCount - 1)) {
		$nextComicIndex = $comicCount - 1;
	}

	$currentComic = $comicImages[$currentComicIndex];
	//print_r($files1);
?>