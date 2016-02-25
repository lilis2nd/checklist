<?php
$type = ['QSG', 'UM'];
$os = ['Jellybean', 'Kitkat', 'Lollipop', 'Marshmallow'];

function selector($array) {
	foreach ($array as $key => $value) {
		echo "<option id='$value'>$value</option>\r\n";
	}
}
?>