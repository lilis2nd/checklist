<?php
// Directory define
define('COMMON', 'common/');
define('QSG', 'qsg/');
define('UM', 'um/');
define('MODAL', 'modals/');

// Variables - Basic
$model			=	$_POST['model'];
$type				=	$_POST['type'];
$os					=	$_POST['os'];
$dest				=	$_POST['dest'];
$language		=	$_POST['language'];
$person			=	$_POST['person'];
$date				= date('Y/m/d');
$time				= date('Y/m/d H:i:s');

// Variables - Detailed
$battery		=	$_POST['battery'];
$network		=	$_POST['network'];
$sim				=	$_POST['sim'];
$book				=	$_POST['book'];
if (isset($_POST['waterproof'])) {
	$waterproof	=	$_POST['waterproof'];
}

// 특이사항 label용
function label($var) {
	echo "<span class=\"label label-info\">$var</span> \r\n";
}

function info($var) {
	echo $var;
}

$n = 1;
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
							<dt>모델명</dt>
							<dd><?php info($model); ?></dd>
							<dt>자재 / OS</dt>
							<dd><?php info($type); ?> / <?php info($os); ?></dd>
							<dt>언어 (출향지)</dt>
							<dd><?php info($language); ?> (<?php info($dest); ?>)</dd>
							<dt>검수자 (검수일)</dt>
							<dd><?php info($person); ?> (<abbr title="<?php echo $time; ?>"><?php info($date); ?></abbr>)</dd>
							<dt>특이사항</dt>
							<dd>
								<?php
								if ($battery == "sep") {
									label("분리형");
								} else {
									label("일체형");
								}

								if ($network == "3g") {
									label("3G");
								} elseif ($network == "lte") {
									label("LTE");
								} else {
									label("Wi-Fi Only");
								}

								if ($sim == "ss") {
									label("Single SIM");
								} elseif ($sim == "ds") {
									label("Dual SIM");
								} elseif ($sim == "na") {
									null;
								} else {
									label("SS/DS");
								}

								if ($book == "qsg") {
									label("QSG 합본");
								} elseif ($book == "sim") {
									label("SS/DS 합본");
								} elseif ($book == "series") {
									label("시리즈 합본");
								}

								if (isset($waterproof)) {
									if ($waterproof == "yes") {
										label("방수");
									}
								}
								?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
			<!-- 참고 자료 -->
			<div class="col-sm-5">
				<div id="reference">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">참고 자료</h3>
						</div>
						<div class="panel-body">
							<?php include('inc.check.ref.php'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<div class="page-header">
					<h3>Quality Checklist</h1>
				</div>
			</div>
			<!-- PASS / FAIL 표기 -->
			<div class="col-sm-2">
				<div class="bg-success">

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed" id="chkTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>구분#1</th>
								<th>구분#2</th>
								<th>검수 사항</th>
								<th>확인</th>
								<th>비고</th>
								<th>예시</th>
								<th>위키</th>
							</tr>
						</thead>
						<tbody>
						<?php

						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<pre class="pre-scrollable">
<?php
print_r($files_common);
var_dump($_POST);
unset($n);
?>
				</pre>
			</div>
		</div>
	</div>
</div>
