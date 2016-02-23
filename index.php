<?php
	$files = ['header', 'main', 'footer'];
	foreach ($files as $index => $filename) {
		include_once("$filename" . ".php");
	}
?>