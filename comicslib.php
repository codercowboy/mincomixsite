<?php

	/*
		This library powers mincomixsite, which is a minimalist web comic web template engine. 

		Download the library and documentation from here:

		https://github.com/codercowboy/mincomixsite

		mincomixsite is Copyright (c) 2018, Coder Cowboy, LLC. All rights reserved.

		Redistribution and use in source and binary forms, with or without
		modification, are permitted provided that the following conditions are met:

		* 1. Redistributions of source code must retain the above copyright notice, this
		list of conditions and the following disclaimer.

		* 2. Redistributions in binary form must reproduce the above copyright notice,
		this list of conditions and the following disclaimer in the documentation
		and/or other materials provided with the distribution.
		  
		THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
		ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
		WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
		DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
		ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
		[INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
		LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
		ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
		[INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
		SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
		  
		The views and conclusions contained in the software and documentation are those
		of the authors and should not be interpreted as representing official policies,
		either expressed or implied.
	*/

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