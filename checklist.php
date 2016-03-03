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
if (isset($_POST['waterproof'])) {
	$waterproof	=	$_POST['waterproof'];
}

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
							<dt>검수자 (검수일)</dt>
							<dd><?php info($person); ?> (<?php info($date); ?>)</dd>
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
								<th>위키</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>EU</td>
								<td>Spanish</td>
								<td>정부 승인 문구가 적용되었는가?</td>
								<td></td>
								<td></td>
								<td><a href="http://10.10.10.9/wiki/M3:PM/%EB%8B%A4%EA%B5%AD%EC%96%B4%EC%82%AC%EC%96%91/EU/Spanish#.EC.A0.95.EB.B6.80_.EC.8A.B9.EC.9D.B8_.EB.AC.B8.EA.B5.AC_.EC.A0.81.EC.9A.A9" target="_blank">보기</a></td>
							</tr>
							<tr>
								<td>1</td>
								<td>EU</td>
								<td>Spanish</td>
								<td>정부 승인 문구가 적용되었는가?</td>
								<td></td>
								<td></td>
								<td><a href="http://10.10.10.9/wiki/M3:PM/%EB%8B%A4%EA%B5%AD%EC%96%B4%EC%82%AC%EC%96%91/EU/Spanish#.EC.A0.95.EB.B6.80_.EC.8A.B9.EC.9D.B8_.EB.AC.B8.EA.B5.AC_.EC.A0.81.EC.9A.A9" target="_blank">보기</a></td>
							</tr>
						</tbody>
					</table>
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
