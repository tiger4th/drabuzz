<?php
define("INPUT", "../../cron/inputD/");
define("OUTPUT", "../../cron/outputD/");
ini_set('display_errors', 0);

//デフォは日付から自動化
$cour = "201207";

if(isset($_GET['cour']) && ctype_digit($_GET['cour'])){
	$cour = $_GET['cour'];
}

//ヘルプでは不要
if(!isset($_GET["help"]) || $_GET["help"]!=1){
$fno = fopen(INPUT.$cour.".txt", 'r');
$input = fread($fno, filesize(INPUT.$cour.".txt"));

fclose($fno);

$input = explode("\\", $input);

$fno = fopen(OUTPUT.$cour.".txt", 'r');
$tmp = fgets($fno, filesize(OUTPUT.$cour.".txt"));
$time = fgets($fno, filesize(OUTPUT.$cour.".txt"));
fclose($fno);
$output = unserialize($tmp);

foreach($input as $key => $value){
	$input[$key] = explode(",", $value);
/*
	if($output[$key]["t"]==0){
	file_get_contents("http://tools.tweetbuzz.jp/imgcount?url=".$input[$key][1]);
		foreach($http_response_header as $header){
			if(preg_match("#^Location: (.*?)([0-9]+?)(\.gif|\.png)?$#", $header, $match)){
				$output[$key]["t"] = intval($match[2]);
				break;
	    	}
		}
	}
*/
	$score = 0;
	$score = $output[$key]["t"] + $output[$key]["f"] + $output[$key]["h"] + $output[$key]["b"] + $output[$key]["2"];
	while(isset($anime[$score])){
		$score++;
	}
	$anime[$score] = $input[$key];
	$anime[$score][0] = rtrim($input[$key][0], "*");
	if($anime[$score][0] == $input[$key][0]){$anime[$score]["o"] = 0;}else{$anime[$score]["o"] = 1;}
	
	$data[$score] = $output[$key];
}

krsort($anime);
krsort($data);
}
?>