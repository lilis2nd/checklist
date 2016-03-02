<?php
	$files = ['header', 'footer'];
	foreach ($files as $index => $filename) {
		include_once("$filename" . ".php");
	}
?>
