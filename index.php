<?php
require_once 'phpfunc.inc.php';
if (isset($_GET['technical'])) {
	require_once 'tech.inc.php';
} elseif (isset($_GET['cultural'])) {
	require_once 'culture.inc.php';
} elseif (isset($_GET['attraction'])) {
	require_once 'attract.inc.php';
} elseif (isset($_GET['contact'])) {
	require_once 'contact.inc.php';
} elseif (isset($_GET['sponsors'])) {
	require_once 'sponsor.inc.php';
} elseif (isset($_GET['home'])) {
	require_once 'home.inc.php';
} else {
	require_once 'index.html';
}
?>