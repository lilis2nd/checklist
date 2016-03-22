<?php
// session start
session_start();

// Directory define
define('COMMON', 'inc/common/');
define('MODAL', 'inc/modals/');
define('INC', 'inc/');
define('CR', "\r\n");

// include('inc.find.php');
include('db.php');

// Variables - Basic
$_SESSION		=	$_POST;
$model			=	$_POST['model'];
$type				=	$_POST['type'];
$os					=	$_POST['os'];
switch($_SESSION['dest']) {
	case 'EU': case 'CIS':
		$region = $_SESSION['region'] = 'Europe';
		break;
	case 'Asia': case 'MEA': case 'SEA': case 'SWA': case 'IND': case 'AUS': case 'NZL':
		$region = $_SESSION['region'] = 'Asia';
		break;
	case 'CHN': case 'CMCC': case 'CTC': case 'CU': case 'HK': case 'TW':
		$region = $_SESSION['region'] = 'China';
		break;
	case 'LTN': case 'MEX': case 'COL': case 'ARG':
		$region = $_SESSION['region'] = 'Latin';
		break;
}
$dest				=	$_POST['dest'];
$language		=	$_POST['language'];
$person			=	$_POST['person'];
$date				= date('Y/m/d');
$time				= date('Y/m/d H:i:s');


// Variables - Detailed
$battery		=	$_POST['battery'];
$network		=	$_POST['network'];
if (isset($_POST['sim'])) {
	$sim				=	$_POST['sim'];
}

$book				=	$_POST['book'];
if (isset($_POST['waterproof'])) {
	$waterproof	=	$_POST['waterproof'];
}

// 특이사항 label용
function label($var) {
	echo "<span class=\"label label-info\">$var</span>".CR;
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
						<h3 class="panel-title">Information</h3>
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

								if (isset($sim)) {
									if ($sim == "ss") {
										label("Single SIM");
									} elseif ($sim == "ds") {
										label("Dual SIM");
									} elseif ($sim == "na") {
										null;
									} else {
										label("SS/DS");
									}
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
							<h3 class="panel-title">Reference</h3>
						</div>
						<div class="panel-body">
							<?php include(INC.'inc.check.ref.php'); ?>
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
								<th>자재</th>
								<th>출향지</th>
								<th>언어</th>
								<th>분류</th>
								<th>검수 사항</th>
								<th>확인</th>
								<th>비고</th>
								<th>예시</th>
								<th>위키</th>
							</tr>
						</thead>
						<tbody>
						<?php

						// modal 불러오기
						$modals = scandir(MODAL, 0);
						for ($i = 2; $i < count($modals); $i++) {
							$modalFiles = [];
							include MODAL . $modals[$i];
							$modalFiles = array_push($modalFiles, $modals[$i]);
						}

						function td($var) {
							echo "<td>".$var."</td>".CR;
						}

						function radio() {
							global $n;
							$checkVal = ['n/a', 'y', 'n'];
							$id = 'radio_'.$n;
							echo "<td>".CR;
							for ($i = 0; $i < count($checkVal); $i++) {
								echo "<label class='radio-inline'>".CR;
								echo "<input type='radio' name='".$id."' id='".$id."' value='".$checkVal[$i]."'>".strtoupper($checkVal[$i]).CR;
								echo "</label>".CR;
							}
							echo "</td>".CR;
						}

						function spread($result) {
							global $n;
							while($get = $result->fetch_assoc()) {
								echo "<tr>".CR;
								td($n);
								td($get['type']);
								td($get['destination']);
								td($get['language']);
								td($get['category']);
								td($get['question']);
								radio();
								if (!isset($get['comment']) && !isset($get['date'])) {
									echo "<td></td>".CR;
								} elseif(!isset($get['date']) && isset($get['comment'])) {
									echo "<td>".CR;
									echo "<ul>".CR;
									echo "<li>".$get['comment']."</li>".CR;
									echo "</ul>".CR;
									echo "</td>".CR;
								} elseif (isset($get['date']) && !isset($get['comment'])) {
									$noti_date = date('Y.m.d', strtotime($get['date']));
									echo "<td>".CR;
									echo "<ul>".CR;
									echo "<li>공지일: ".$noti_date."</li>".CR;
									echo "</ul>".CR;
									echo "</td>".CR;
								} elseif (isset($get['date']) && isset($get['comment'])) {
									$noti_date = date('Y.m.d', strtotime($get['date']));
									echo "<td>".CR;
									echo "<ul>".CR;
									echo "<li>".$get['comment']."</li>".CR;
									echo "<li><small>공지일: ".$noti_date."</small></li>".CR;
									echo "</ul>".CR;
									echo "</td>".CR;
								}
								// td($get['example']);
								echo "<td>";
								if(isset($get['example'])) {
									echo "<a href='#".$get['example']."' data-toggle='modal'>보기</a>";
								} else {
									null;
								}
								echo "</td>".CR;

								if(isset($get['wiki'])) {
									echo "<td>";
									echo "<a href='".$get['wiki']."' target='_blank'>보기</a>";
									echo "</td>".CR;
								} else { echo "<td></td>".CR; }
								echo "</tr>".CR;
								$n++;
								unset($get);
							}
						}

						if ($language == 'English') { //영어
							null;
						} else { // 다국어
							// 공통
							$sql = "SELECT * FROM Common WHERE type = '공통' AND region = '공통' AND destination = '공통' AND language = '공통' AND category = '공통'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);

							// 자재
							$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '공통' AND destination = '공통' AND language = '공통' AND category = '공통' AND 다국어 = 'Y'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);

							if ($region == "China" && $language == "Chinese") {

								// China 공통
								$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '".$region."' AND destination = '공통' AND language = '".$language."' AND category = '공통' AND 다국어 = 'Y'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);

								switch(true) {
									case ($dest == 'HK'):
									case ($dest == 'TW'):
										$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '".$region."' AND destination = '".$dest."' AND language = '".$language."' AND category = '공통' AND 다국어 = 'Y'";
										if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
										spread($result);
										break;

									case ($dest != 'HK' || $dest != 'TW'):
										// CHN 공통
										$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '".$region."' AND destination = 'CHN' AND language = '".$language."' AND category = '공통' AND 다국어 = 'Y'";
										if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
										spread($result);
										// break;

										// CMCC / CTC / CU
										switch($dest) {
											case 'CMCC':
											case 'CTC':
											case 'CU':
												$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '".$region."' AND destination = '".$dest."' AND language = '".$language."' AND category = '공통' AND 다국어 = 'Y'";
												if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
												spread($result);
												break;
										}
								}

							} else {

								// 지역
								$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '".$region."' AND destination = '공통' AND language = '공통' AND category = '공통' AND 다국어 = 'Y'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);

								// 출향지
								$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '".$region."' AND destination = '".$dest."' AND rtl = '".($language == "Arabic"||$language == "Farsi"||$language == "Urdu"||$language == "Hebrew" ? 'Y' : 'N')."' AND language = '공통' AND category = '공통' AND 다국어 = 'Y'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);

								// 언어
								$sql = "SELECT * FROM Common WHERE type = '".$type."' AND region = '".$region."' AND destination = '".$dest."' AND language = '".$language."' AND category = '공통' AND 다국어 = 'Y'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);
							}
						}

						switch (true) {
							// 네트워크
							case ($network == '3g'):
							case ($network == 'lte'):
								$sql = "SELECT * FROM Common WHERE destination = '".$dest."' AND language = '".$language."' AND category = '3G/LTE' AND 다국어 = 'Y'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);
								break;

							case ($network == 'wifi'):
								$sql = "SELECT * FROM Common WHERE language = '".$language."' AND category = 'Wi-Fi 전용' AND 다국어 = 'Y'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);
								break;
						}

						switch ($battery) {// 배터리
							case 'uni':
								$temp = $conn->query("SELECT * FROM Common WHERE destination = '".$dest."' AND language = '".$language."' AND category = '일체형'");
								if($temp->num_rows == 0) {
									// $sql = "SELECT * FROM Common WHERE region = '".$region."' AND language = '공통' AND  category = '일체형' AND 다국어 = 'Y'";
									if ($dest == 'CIS') {
										$sql = "SELECT * FROM Common WHERE destination = '".$dest."' AND language = '공통' AND  category = '일체형' AND 다국어 = 'Y'";
										if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
										spread($result);
									} else {
										$sql = "SELECT * FROM Common WHERE region = '".$region."' AND language = '공통' AND  category = '일체형' AND 다국어 = 'Y'";
										if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
										spread($result);
									}
								} else {
									$sql = "SELECT * FROM Common WHERE destination = '".$dest."' AND language = '공통' AND  category = '일체형' AND 다국어 = 'Y'";
									if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
									spread($result);
									$sql = "SELECT * FROM Common WHERE destination = '".$dest."' AND language = '".$language."' AND  category = '일체형' AND 다국어 = 'Y'";
									if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
									spread($result);
								}
								break;
							case 'sep':
								break;
						}

						switch($book) {
							case 'qsg_multi':
								$sql = "SELECT * FROM Common WHERE category = '책 - QSG 합본'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);

							case 'qsg_single':
								$sql = "SELECT * FROM Common WHERE category = '책 - QSG'";
								if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
								spread($result);

								break;

							case 'sim':
								break;

							case 'series':
								break;
						}

						// // 공통 항목 불러오기
						// $sql = "SELECT * FROM Common WHERE type LIKE '공통' AND category LIKE '공통' ORDER BY Common . id ASC";
						// if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
 					// 	if ($result->num_rows === 0) {echo "nothing to add"; }
						// spread($result);

						// // 공통 + 자재
						// $sql = "SELECT * FROM Common WHERE type LIKE '".$type."' AND destination LIKE '공통' AND language like '공통' AND 영어 LIKE 'Y' AND 다국어 LIKE 'Y' AND category LIKE '공통'";
						// if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
 					// 	if ($result->num_rows === 0) {echo "nothing to add"; }
						// spread($result);

						// // 공통 + 자재 + 영/다
						// $sql = "SELECT * FROM Common WHERE type LIKE '".$type."' AND destination LIKE '공통' AND language like '공통' AND " . ($language == "English" ? "영어 LIKE 'Y' AND 다국어 LIKE 'N'" : "영어 LIKE 'N' AND 다국어 LIKE 'Y'")." AND category LIKE '공통'";
						// if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
 					// 	if ($result->num_rows === 0) {echo "nothing to add"; }
						// spread($result);

						// // 공통 + 자재 + 출향
						// $sql = "SELECT * FROM Common WHERE type LIKE '".$type."' AND destination LIKE '".$dest."' AND language like '공통' AND 영어 LIKE 'Y' AND 다국어 LIKE 'Y' AND category LIKE '공통'";
						// if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
 					// 	if ($result->num_rows === 0) {echo "nothing to add"; }
						// spread($result);

						// // 배터리 일체형/분리형 구분
						// switch($battery) {
						// 	case 'uni':
						// 		if ($dest == "EU") {
						// 			$sql = "SELECT * FROM Common WHERE type LIKE '".$type."' AND destination LIKE '".$dest."' AND language like '공통' AND 영어 LIKE 'Y' AND 다국어 LIKE 'Y' AND category LIKE '배터리 일체형'";
						// 				if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
				 	// 					if ($result->num_rows === 0) {echo "nothing to add"; }
						// 				spread($result);
						// 		} else {
						// 			null;
						// 		}
						// 		break;

						// 	case 'sep':
						// 		break;

						// 	default:
						// 		break;
						// }

						// // 공통 + 자재 + 출향 + 영/다
						// $sql = "SELECT * FROM Common WHERE type LIKE '".$type."' AND destination LIKE '".$dest."' AND language like '".$language."' AND " . ($language == "English" ? "영어 LIKE 'Y' AND 다국어 LIKE 'N'" : "영어 LIKE 'N' AND 다국어 LIKE 'Y'")." AND category LIKE '공통'";
						// if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
 					// 	if ($result->num_rows === 0) {echo "nothing to add"; }
						// spread($result);

						// // 3G / LTE / Wi-Fi
						// switch($network) {
						// 	case '3g':
						// 	case 'lte':
						// 		$sql = "SELECT * FROM Common WHERE type LIKE '".$type."' AND destination LIKE '".$dest."' AND language like '".$language."' AND " . ($language == "English" ? "영어 LIKE 'Y' AND 다국어 LIKE 'N'" : "영어 LIKE 'N' AND 다국어 LIKE 'Y'")." AND category LIKE '3G/LTE'";
						// 			if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
			 		// 				if ($result->num_rows === 0) {echo "nothing to add"; }
						// 			spread($result);
						// 		break;
						// 	case 'wifi':
						// 		$sql = "SELECT * FROM Common WHERE type LIKE '".$type."' AND destination LIKE '".$dest."' AND language like '".$language."' AND " . ($language == "English" ? "영어 LIKE 'Y' AND 다국어 LIKE 'N'" : "영어 LIKE 'N' AND 다국어 LIKE 'Y'")." AND category LIKE 'Wi-Fi 전용'";
						// 		if (!$result = $conn->query($sql)) {echo "sorry.".CR; echo "Errno:".$conn->errno.CR; echo "Error:".$conn->error.CR; exit; }
		 			// 			if ($result->num_rows === 0) {echo "nothing to add"; }
						// 		spread($result);
						// 		break;
						// 	default:
						// 		break;
						// }


						// 방수일 때

						// 합본일 때



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
print_r($_POST);
print_r($_SESSION);
unset($n);


?>
				</pre>
			</div>
		</div>
	</div>
</div>
