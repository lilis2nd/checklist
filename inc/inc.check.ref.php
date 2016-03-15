<?php
$eng_qsg = [
	'//wiki.astkorea.net/wiki/M3%EC%98%81%EB%AC%B8/%ED%91%9C%EC%A4%80%ED%99%94_%EA%B3%B5%EC%A7%80-QSG' => '영문 QSG 표준화 공지'
];

$eng_um = [
	'//wiki.astkorea.net/wiki/M3%EC%98%81%EB%AC%B8/%ED%91%9C%EC%A4%80%ED%99%94_%EA%B3%B5%EC%A7%80-UM3' => 'UM 작성 가이드',
	'//wiki.astkorea.net/wiki/M3%EC%98%81%EB%AC%B8/Wi-Fi%263G(LTE)_%ED%8C%8C%EC%83%9D%EA%B0%80%EC%9D%B4%EB%93%9C' => 'Wi-Fi & 3G(LTE) 파생가이드',
	'//wiki.astkorea.net/wiki/M3%EC%98%81%EB%AC%B8/DS_SS_%ED%86%B5%ED%95%A9%ED%98%95_%EB%A7%A4%EB%89%B4%EC%96%BC_%EC%9E%91%EC%84%B1%EA%B0%80%EC%9D%B4%EB%93%9C' => 'DS/SS 통합형 매뉴얼 작성가이드',
	'//wiki.astkorea.net/wiki/M3%EC%98%81%EB%AC%B8/%EC%8B%9C%EB%A6%AC%EC%A6%88_%ED%86%B5%ED%95%A9%ED%98%95_%EB%A7%A4%EB%89%B4%EC%96%BC_%EC%9E%91%EC%84%B1%EA%B0%80%EC%9D%B4%EB%93%9C' => '시리즈 통합형 매뉴얼 작성가이드'
];

$ml = [
	'//wiki.astkorea.net/wiki/M3:PM#EU' => 'EU 국가 사양',
	'//wiki.astkorea.net/wiki/M3:PM#EU(CIS)' => 'CIS 국가 사양',
	'//wiki.astkorea.net/wiki/M3:PM#MEA' => 'MEA 국가 사양',
	'//wiki.astkorea.net/wiki/M3:PM#SEA' => 'SEA 국가 사양',
	'//wiki.astkorea.net/wiki/M3:PM#CHN' => 'CHN 국가 사양',
	'//wiki.astkorea.net/wiki/M3:PM#LTN_.2F_MEX' => 'LTN/MEX 국가 사양'
];

function lister($array) {
	echo "<ul>\r\n";
	foreach ($array as $key => $value) {
		echo "<li><a href=\"$key\" target=\"_blank\">$value</a></li>\r\n";
	}
	echo "</ul>\r\n";
}

if ($language == "English") {
	echo "<h5>QSG</h5>\r\n";
	lister($eng_qsg);
	echo "<h5>UM</h5>\r\n";
	lister($eng_um);
} else {
	lister($ml);
}
?>