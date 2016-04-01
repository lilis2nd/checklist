<?php

// Session restart
session_start([
	'read_and_close' => true,
]);
session_unset();
// session_destroy();
// session_write_close();
// setcookie(session_name(),'',0,'/');
// session_regenerate_id();

$type = ['QSG', 'UM'];
$os = ['Jellybean', 'Kitkat', 'Lollipop', 'Marshmallow'];
$dest = [
	['Europe', 'EU', 'CIS'],
	['Asia', 'MEA', 'SEA', 'SWA', 'IND', 'AUS', 'NZL'],
	['China', 'CHN', 'CMCC', 'CTC', 'CU', 'HK', 'TW'],
	['Latin', 'LTN', 'MEX', 'COL', 'ARG']
];
$language = ['English','Albanian','Arabic','Bulgarian','Chinese','Croatian','Czech','Danish','Dutch','Estonian','Farsi','Finnish','French','German','Greek','Hebrew','Hungarian','Indonesian','Italian','Kazakh','Latvian','Lithuanian','Macedonian','Norwegian','Polish','Portuguese','Romanian','Russian','Serbian','Slovak','Slovenian','Spanish','Swedish','Thai','Turkish','Ukrainian','Urdu','Uzbek','Vietnamese'];

function selector($array) {
	// 다차원배열이 아닐 경우
	if (count($array) == count($array, COUNT_RECURSIVE)) {
		foreach ($array as $key => $value) {
			echo "<option id='" . mb_strtolower($value) . "'>" . $value . "</option>\r\n";
		}
	} else {
		// 다차원배열일 경우
		for ($i=0; $i < count($array); $i++) {
			$_SESSION['region'] = $array[$i][0];
			echo "<optgroup label=\"".$array[$i][0]."\">\r\n";
			for ($j=1; $j < count($array[$i]); $j++) {
				echo "<option id='" . mb_strtolower($array[$i][$j]) . "'>" . $array[$i][$j] . "</option>";
			}
			echo "</optgroup>\r\n";
		}
	}
}
?>

<main>
	<div class="container">
		<form class="form-horizontal" action="check.php" method="post">
			<fieldset>
				<legend>Basic information</legend>
				<div class="form-group form-group-sm">
					<!-- 모델명 -->
					<label for="model" class="col-sm-1 control-label">모델명</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="model" name="model" placeholder="모델명" />
					</div>
					<!-- 자재 -->
					<label for="type" class="col-sm-1 control-label">자재</label>
					<div class="col-sm-3">
						<select name="type" id="type" class="form-control">
							<?php selector($type); ?>
						</select>
					</div>
					<!-- OS -->
					<label for="os" class="col-sm-1 control-label">OS</label>
					<div class="col-sm-3">
						<select name="os" id="os" class="form-control">
							<?php selector($os); ?>
						</select>
					</div>
				</div>
				<div class="form-group form-group-sm">
					<!-- 출향지 -->
					<label for="dest" class="col-sm-1 control-label">출향지</label>
					<div class="col-sm-3">
						<select name="dest" id="dest" class="form-control">
							<?php selector($dest); ?>
						</select>
					</div>

					<!-- 언어 -->
					<label for="language" class="col-sm-1 control-label">언어</label>
					<div class="col-sm-3">
						<select name="language" id="language" class="form-control">
							<script>
							function getLangs(target) {
								var EU = ['English','Albanian','Bulgarian','Croatian','Czech','Danish','Dutch','Estonian','Finnish','French','German','Greek','Hungarian','Italian','Latvian','Lithuanian','Macedonian','Norwegian','Polish','Portuguese','Romanian','Serbian','Slovak','Slovenian','Spanish','Swedish'];
								var CIS = ['English', 'Kazakh','Russian','Ukrainian','Uzbek'];
								var MEA = ['English','Arabic','Farsi','French','Hebrew','Turkish','Urdu'];
								var SEA = ['English','Indonesian','Chinese','Thai','Vietnamese'];
								var SWA = IND = AUS = NZL = ['English'];
								var CHN = CMCC = CTC = CU = HK = TW = ['English','Chinese'];
								var LTN = MEX = COL = ARG = ['English','Spanish'];

								if (target == "EU") {return EU;}
								else if (target == "CIS") {return CIS;}
								else if (target == "MEA") {return MEA;}
								else if (target == "SEA") {return SEA;}
								else if (target == "SWA") {return SWA;}
								else if (target == "IND") {return SWA;}
								else if (target == "AUS") {return AUS;}
								else if (target == "NZL") {return NZL;}
								else if (target == "CHN") {return CHN;}
								else if (target == "CMCC") {return CMCC;}
								else if (target == "CTC") {return CTC;}
								else if (target == "CU") {return CU;}
								else if (target == "HK") {return HK;}
								else if (target == "TW") {return TW;}
								else if (target == "LTN") {return LTN;}
								else if (target == "MEX") {return MEX;}
								else if (target == "COL") {return COL;}
								else if (target == "ARG") {return ARG;}
								else {return null;}
							}

								function optList(array) {
									$('#language').empty();
									jQuery.each(array, function(index, value) {
										$('#language').append("<option>" + value + "</option>");
									});
								}

								$('#dest').on('change', function() {
									var value = $(this).val();
									var targetName = getLangs(value);
									optList(targetName);
								})
							</script>
						</select>
					</div>

					<!-- 검수자 -->
					<label for="person" class="col-sm-1 control-label">검수자</label>
					<div class="col-sm-3">
						<input type="text" name="person" id="person" class="form-control" />
					</div>
				</div>
			</fieldset>

			<fieldset>
				<legend>Details</legend>
				<div class="form-group form-group-sm">
					<!-- 배터리 -->
					<label for="battery" class="col-sm-1 control-label">Battery</label>
					<div class="col-sm-3">
						<select name="battery" id="battery" class="form-control">
							<option value="sep">분리형</option>
							<option value="uni">일체형</option>
						</select>
					</div>
					<!-- 네트워크 -->
					<label for="network" class="col-sm-1 control-label">Network</label>
					<div class="col-sm-3">
						<select name="network" id="network" class="form-control">
							<option value="3g">3G</option>
							<option value="lte">LTE</option>
							<option value="wifi">Wi-Fi Only</option>
						</select>
					</div>
					<!-- 심카드 -->
					<label for="sim" class="col-sm-1 control-label">SIM</label>
					<div class="col-sm-3">
						<select name="sim" id="sim" class="form-control">
							<option value="ss">Single SIM</option>
							<option value="ds">Dual SIM</option>
							<option value="ssds">SS/DS</option>
							<option value="na">N/A</option>
						</select>
					</div>

					<script>
						$('#network').on("change", function() {
							if ($('#network').val() == "wifi") {
								$('#sim').attr("disabled", "disabled");
								$('#sim').val('na');
							} else {
								$('#sim').removeAttr("disabled");
							}
						});
					</script>

				</div>
				<div class="form-group form-group-sm">
					<!-- 합본/책 -->
					<label for="book" class="col-sm-1 control-label">합본</label>
					<div class="col-sm-3">
						<select name="book" id="book" class="form-control">
							<option value="na">N/A</option>
							<option value="qsg_single">Book형 QSG</option>
							<option value="qsg_multi">합본 QSG</option>
							<option value="sim">SS/DS 합본</option>
							<option value="series">시리즈 합본</option>
						</select>
					</div>
					<!-- 방수 -->
					<label for="waterproof" class="col-sm-1 control-label">방수</label>
					<div class="col-sm-3">
						<label class="radio-inline">
							<input type="radio" name="waterproof" value="yes" />Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="waterproof" value="no" />No
						</label>
					</div>
				</div>
			</fieldset>
			<div class="row">
				<div class="col-sm-12">
					<div class="center-block">
						<button type="submit" class="btn btn-primary btn-sm">체크리스트 불러오기</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>
