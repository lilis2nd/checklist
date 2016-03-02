<?php
	$files = ['header', 'menu', 'log', 'footer'];
	foreach ($files as $index => $filename) {
		include_once("$filename" . ".php");
	}
?>