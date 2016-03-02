<?php

// Session restart

$type = ['QSG', 'UM'];
$os = ['Jellybean', 'Kitkat', 'Lollipop', 'Marshmallow'];
$dest = [
	['Europe', 'EU', 'CIS'],
	['Asia', 'MEA', 'SEA', 'SWA', 'IND', 'AUS', 'NZL'],
	['China', 'CHN', 'CMCC', 'CTC', 'CU', 'HK', 'TC'],
	['Latin', 'LTN', 'MEX', 'COL', 'ARG']
];
$language = ['English', 'Albanian', 'Arabic', 'Bulgarian', 'Chinese', 'Croatian', 'Czech', 'Danish', 'Dutch', 'Estonian', 'Farsi', 'Finnish', 'French', 'German', 'Greek', 'Hebrew', 'Hungarian', 'Indonesian', 'Italian', 'Latvian', 'Lithuanian', 'Macedonian', 'Norwegian', 'Polish', 'Portuguese', 'Romanian', 'Serbian', 'Slovak', 'Slovenian', 'Spanish', 'Swedish', 'Thai', 'Turkish', 'Kazakh', 'Russian', 'Ukrainian', 'Urdu', 'Uzbek', 'Vietnamese'];

function selector($array) {
	// 다차원배열이 아닐 경우
	if (count($array) == count($array, COUNT_RECURSIVE)) {
		foreach ($array as $key => $value) {
			echo "<option id='" . mb_strtolower($value) . "'>" . $value . "</option>\r\n";
		}
	} else {
		// 다차원배열일 경우
		for ($i=0; $i < count($array); $i++) {
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
							<option><?php selector($language); ?></option>
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
							<option value="wifi">Wi-Fi</option>
						</select>
					</div>
					<!-- 심카드 -->
					<label for="sim" class="col-sm-1 control-label">SIM</label>
					<div class="col-sm-3">
						<select name="sim" id="sim" class="form-control">
							<option value="ss">SS</option>
							<option value="ds">DS</option>
							<option value="ssds">SS/DS</option>
						</select>
					</div>
				</div>
				<div class="form-group form-group-sm">
					<!-- 합본/책 -->
					<label for="book" class="col-sm-1 control-label">합본</label>
					<div class="col-sm-3">
						<select name="book" id="book" class="form-control">
							<option value="na">N/A</option>
							<option value="qsg">QSG 합본</option>
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
