<?php
// Variables - Basic
$model			=	$_POST['model'];
$type				=	$_POST['type'];
$os					=	$_POST['os'];
$dest				=	$_POST['dest'];
$language		=	$_POST['language'];
$person			=	$_POST['person'];

// Variables - Detailed
$battery		=	$_POST['battery'];
$network		=	$_POST['network'];
$sim				=	$_POST['sim'];
$book				=	$_POST['book'];
$waterproof	=	$_POST['waterproof'];
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php 
			var_dump($_POST);
			?>
		</div>
	</div>
</div>
