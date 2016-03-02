<?php
// Variables - Basic
$model			=	$_POST['model'];
$type				=	$_POST['type'];
$os					=	$_POST['os'];
$dest				=	$_POST['dest'];
$language		=	$_POST['language'];
$person			=	$_POST['person'];
$date				= date('Y/m/d');

// Variables - Detailed
$battery		=	$_POST['battery'];
$network		=	$_POST['network'];
$sim				=	$_POST['sim'];
$book				=	$_POST['book'];
$waterproof	=	$_POST['waterproof'];

function info($var) {
	echo $var;
}
?>
<div class="container">
	<div id="checklist">
		<div class="row">
			<!-- 모델 정보 -->
			<div class="col-sm-7">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Check Information</h3>
					</div>
					<div class="panel-body">
						<dl class="dl-horizontal">
							<dt>모델명 (출향지)</dt>
							<dd><?php info($model); ?> (<?php info($dest); ?>)</dd>
							<dt>자재 / OS</dt>
							<dd><?php info($type); ?> / <?php info($os); ?></dd>
							<dt>언어</dt>
							<dd><?php info($language); ?></dd>
							<dt>검수자 / 검수일</dt>
							<dd><?php info($person); ?> / <?php info($date); ?></dd>
						</dl>
					</div>
				</div>
			</div>
			<!-- 참고 자료 -->
			<div class="col-sm-5">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">참고 자료</h3>
					</div>
					<div class="panel-body">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h3>Quality Checklist</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<pre class="pre-scrollable">
				<?php
				var_dump($_POST);
				?>
				</pre>
			</div>
		</div>
	</div>
</div>
