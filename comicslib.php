<?php

	class Comic {
		public $date = NULL;
		public $imageFileRelativePath = NULL;
	}

	class ComicManager {

		private $validComicImageFileExtensions = ["gif", "jpg", "jpeg", "png"];
		private $datePattern = "/\\d\\d\\d\\d\\d\\d\\d\\d/"; 

		//returns child directory names for given directory, ".", and ".." are ommitted.
		function getChildDirectories($directory) {
			if (!is_dir($directory)) {
				throw new Exception("Not a directory: " . $directory);
			}
			$result = array();
			$filelist = scandir($directory);
			foreach ($filelist as $file) {
				$filePath = $directory . DIRECTORY_SEPARATOR . $file;
				if ("." == $file || ".." == $file || !is_dir($filePath)) {
					continue;
				}
				array_push($result, $file);
			}
			return $result;
		}

		//returns name of first image in given directory
		function findFirstImage($directory) {
			if (!is_dir($directory)) {
				throw new Exception("Not a directory: " . $directory);
			}
			$filelist = scandir($directory);
			foreach ($filelist as $file) {
				$filePath = $directory . DIRECTORY_SEPARATOR . $file;
				if (is_dir($filePath)) {
					continue;
				}
				$fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
				if (in_array(strtolower($fileExtension), $this->validComicImageFileExtensions)) {
					return $file;
				}
			}
			return NULL;
		}

		//returns array of Comic objects
		function findComics($directory) {
			if (!is_dir($directory)) {
				throw new Exception("Not a directory: " . $directory);
			}
			$result = array();
			$childDirectories = $this->getChildDirectories($directory);
			//matches something in an 8 digit number format ie 20181201
			foreach ($childDirectories as $childDir) {
				if (!preg_match($this->datePattern, $childDir)) {
					continue;	
				}
				//convert child dir into relative path, ie change from "20181202" to "comics/20181202"
				$childDirPath = $directory . DIRECTORY_SEPARATOR . $childDir;
				$comicImageFile = $this->findFirstImage($childDirPath);
				if ($comicImageFile != NULL) {
					$comicImageFile = $childDirPath . DIRECTORY_SEPARATOR . $comicImageFile;
					//echo "Found: " . $childDir . "  " . $comicImageFile . "<br/>";
					$comic = new Comic;
					$comic->date = $childDir;
					$comic->imageFileRelativePath = $comicImageFile;
					array_push($result, $comic);
				}
			}
			return $result;
		}		
	}

	function getComicIndexFromURLParam($comics) {
		$comicCount = count($comics);
		if (!isset($_GET["comic"])) {
			return $comicCount - 1;
		}
		$urlParamValue = isset($_GET["comic"]) ? $_GET["comic"] : NULL;
		//echo "url 'comic' param: " . $urlParamIndex . "<br/>";
		if ($urlParamValue === "first") {
			return 0;
		} else if ($urlParamValue === "last") {
			return $comicCount - 1;
		} 

		//see if we have a comic with a date that matches the url param
		$index = 0;
		foreach ($comics as $comic) {
			if ($comic->date === $urlParamValue) {
				return $index;
			}
			$index++;
		}

		if (is_numeric($urlParamValue)) {
			$intValue = $urlParamValue + 0;
			if ($intValue < $comicCount) {
				return $intValue;
			}
		}
		return $comicCount - 1;
	}

	//TODO: error if comics directory doesnt exist

	$cm = new ComicManager;
	$comics = $cm->findComics("comics");

	$comicCount = count($comics);
	$currentComicIndex = getComicIndexFromURLParam($comics);
	$currentComicImage = $comics[$currentComicIndex]->imageFileRelativePath;
	
	$previousComicIndex = $currentComicIndex - 1;
	if ($previousComicIndex < 0) {
		$previousComicIndex = 0;
	}
	$previousComicDate = $comics[$previousComicIndex]->date;
	
	$nextComicIndex = $currentComicIndex + 1;
	if ($nextComicIndex > ($comicCount - 1)) {
		$nextComicIndex = $comicCount - 1;
	}
	$nextComicDate = $comics[$nextComicIndex]->date;
?>