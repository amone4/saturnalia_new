<?php

function getJSON($file_path) {
	return trim(preg_replace('/\s+/', ' ', '\''.file_get_contents('./'.$file_path.'.json').'\''));
}

function escapeData($data) {
	$data = addslashes(trim($data));
	$data = strip_tags($data);
	return $data;
}

function validateName($name) {
	if (preg_match('%^[A-Za-z\.\'\-]{2,20}$%', stripslashes(trim($name)))) {
		return true;
	} else {
		return false;
	}
}

function validateEmail($email) {
	if (preg_match('%^[A-Za-z0-9._-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$%', stripslashes(trim($email)))) {
		return true;
	} else {
		return false;
	}
}

/**
 * function returns an associative array with keys being all values in given array and each value being null
 * @param  array $arr array containing the keys of the required associative array
 * @return associative array      returns the associative array with null values
 */
function nullArray($arr) {
	$temp;
	foreach ($arr as $value) {
		$temp[$value]=null;
	}
	return $temp;
}

/**
 * function checks if the GET variables with index in the array are set and not empty, and then escapes them by escapeData function
 * @param  associative array &$get contains indices of GET variables and stores the escaped version of the data
 * @param  string &$err [optional] stores the index which caused the error to generate
 * @return boolean       returns true if data was present, false otherwise
 */
function getVars(&$get,&$err=null) {
	foreach ($get as $key => &$value) {
		if (isset($_GET[$key])&&!empty($_GET[$key])) {
			$value=escapeData($_GET[$key]);
		} else {
			$err=$key;
			return false;
		}
	}
	return true;
}

/**
 * function checks if the POST variables with index in the array are set and not empty, and then escapes them by escapeData function
 * @param  associative array &$get contains indices of POST variables and stores the escaped version of the data
 * @param  string &$err [optional] stores the index which caused the error to generate
 * @return boolean       returns true if data was present, false otherwise
 */
function postVars(&$post,&$err=null) {
	foreach ($post as $key => &$value) {
		if (isset($_POST[$key])&&!empty($_POST[$key])) {
			$value=escapeData($_POST[$key]);
		} else {
			$err=$key;
			return false;
		}
	}
	return true;
}

?>