<?php

/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}


function bqToimage($str){
	preg_match_all("/\[em_(\d+)\]/", $str, $metch);
	foreach($metch[0] as $k => $v){
		$str = str_replace($v, '<img src="/home/images/face/'.$metch[1][$k].'.gif">', $str);
	}
	return $str;
}