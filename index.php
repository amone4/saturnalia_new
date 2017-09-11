<?php
require_once 'phpfunc.inc.php';
if (isset($_GET['tech'])) {
	require_once 'tech.inc.php';
} elseif (isset($_GET['culture'])) {
	require_once 'culture.inc.php';
} elseif (isset($_GET['attract'])) {
	require_once 'attract.inc.php';
} elseif (isset($_GET['contact'])) {
	require_once 'contact.inc.php';
} elseif (isset($_GET['sponsor'])) {
	require_once 'sponsor.inc.php';
} else {
	require_once 'index.html';
}
?>