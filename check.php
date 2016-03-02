<?php
	$files = ['header', 'checklist', 'footer'];
	foreach ($files as $index => $filename) {
		include_once("$filename" . ".php");
	}
?>
