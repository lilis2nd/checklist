<?php
	$files = ['header', 'menu', 'main', 'footer'];
	foreach ($files as $index => $filename) {
		include_once("$filename" . ".php");
	}
?>