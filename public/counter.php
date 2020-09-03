<?php

// データ保存パス
$dat_path = "./count.dat";
// ttfフォントパス
$font_path = "./font.ttf";

$file = file($dat_path);
$count = 0;
if(!$file){
	$count = 1;
	file_put_contents($dat_path,$count."<>".$_SERVER["REMOTE_ADDR"]);
} else {
	list($count,$ip) = explode("<>",$file[0]);
	if($ip != $_SERVER["REMOTE_ADDR"]){
		$count++;
		file_put_contents($dat_path,$count."<>".$_SERVER["REMOTE_ADDR"]);
	}
}
if(!empty($_GET["img"]) && $_GET["img"] == "1"){
	text(str_pad($count,7,"0",STR_PAD_LEFT),$font_path);
}

function text($text,$font_path){
	$result = imagettfbbox(32,0,$font_path,$text);

	// 左上
	$x0 = $result[6];
	$y0 = $result[7];
	// 右下
	$x1 = $result[2];
	$y1 = $result[3];

	// 幅と高さを取得
	$width = $x1 - $x0 + $x0 + 3;
	$height = $y1 - $y0 + $y1 + 3;

	$img = imagecreatetruecolor($width,$height);
	$black = imagecolorallocate($img,0,0,0);
	$grey = imagecolorallocate($img,185,185,185);
	$white = imagecolorallocate($img,255,255,255);

	imagefilledrectangle($img,0,0,$width,$height,$white);
	imagettftext($img,32,0,3,35,$grey,$font_path,$text);
	imagettftext($img,32,0,0,32,$black,$font_path,$text);
	header("Content-Type: image/png");
	imagepng($img);
	imagedestroy($img);
}
?>
