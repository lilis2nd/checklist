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
						$modals = scandir(MODAL, 0);

						// modal 불러오기
						for ($i = 2; $i < count($modals); $i++) {
							$modalFiles = [];
							include MODAL . $modals[$i];
							$modalFiles = array_push($modalFiles, $modals[$i]);
						}

						// Checklist Function
						function checklist($array, $dir) {
							global $n, $type;

							for ($i = 2; $i < count($array); $i++) {

								//preset
								$check = [];
								$check['id'] = basename($array[$i], '.php');

								//get file
								include_once $dir . $array[$i];


								// row 시작
								echo "<tr>\r\n";

								// 자동 번호 매기기
								echo "<td>". $n . "</td>\r\n";

								// 구분#1
								if (preg_match('/^common_/i', $array[$i])) {
									echo "<td>공통</td>\r\n";
								} else {
									$div1 = explode('_', $array[$i]);
									for ($j=0; $j < 1; $j++) {
										echo "<td>".strtoupper($div1[$j])."</td>\r\n";
									}
								}

								// 구분#2
								echo "<td>\r\n";
								if (empty($check['구분'])) {
									echo "공통";
								} else {
									echo $check['구분'];
								}
								echo "</td>\r\n";

								// 검수사항
								echo "<td>".$check['검수사항']."</td>\r\n";

								// 확인
								echo "<td>\r\n";
								$checkVal = ['n/a', 'y', 'n'];
								for ($j = 0; $j < count($checkVal); $j++) {
									echo "<label class='radio-inline'>\r\n";
									echo "<input type='radio' name='".$check['id']."' id='".$check['id']."' value='".$checkVal[$j]."'>".strtoupper($checkVal[$j])."\r\n";
									echo "</label>\r\n";
								}
								echo "</td>\r\n";

								// 비고 & 공지
								echo "<td>\r\n";
								if (!empty($check['비고']) && !empty($check['공지일'])) {
									echo "<ul>\r\n";
										echo "<li>".$check['비고']."</li>\r\n";
										echo "<li><small>공지일: ".$check['공지일']."</small></li>\r\n";
									echo "</ul>\r\n";
								} elseif (!empty($check['비고']) && empty($check['공지일'])) {
									echo "<ul>\r\n";
										echo "<li>".$check['비고']."</li>\r\n";
									echo "</ul>\r\n";
								} elseif (empty($check['비고']) && !empty($check['공지일'])) {
									echo "<ul>\r\n";
										echo "<li><small>공지일: ".$check['공지일']."</small></li>\r\n";
									echo "</ul>\r\n";
								} else {
									null;
								}
								echo "</td>\r\n";

								// 예시
								echo "<td>\r\n";
								$modalFile = MODAL . $check['id'] . ".php";
								if (file_exists($modalFile)) {
									echo "<a href='#". $check['id'] ."' data-toggle='modal'>보기</a>\r\n";
								} else {
									echo "&ndash;";
								}
								echo "</td>\r\n";

								// 위키
								echo "<td>\r\n";
								if (empty($check['위키'])) {
									echo "&ndash;";
								} else {
									echo "<a href='".$check['위키']."' target='_blank'>보기</a>";
								}
								echo "</td>\r\n";

								// row 끝내기
								echo "</tr>\r\n";

								// 자동 번호 +1 하기
								$n++;
							}
						}

						// QSG & UM 공통 가져오기
						$common = scandir(COMMON, 0);
						$qsg = scandir(QSG, 0);
						$um = scandir(UM, 0);

						if ($type == "QSG") {
							checklist($common, COMMON);
							checklist($qsg, QSG);
						} else {
							checklist($common, COMMON);
							checklist($um, UM);
						}

						// switch($type) {
						// 	case 'QSG':
						// 		checklist($common);
						// 		checklist($qsg);
						// 		break;

						// 	case 'UM':
						// 		checklist($common);
						// 		checklist($um);
						// 		break;

						// 	default:
						// 		break;
						// }

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
print_r(get_included_files());
print_r($files);
print_r($_POST);
print_r($_SESSION);
unset($n);
?>
				</pre>
			</div>
		</div>
	</div>
</div>
