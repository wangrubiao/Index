<?php 
/**
 * 判断是否手机号
 */
function is_mob($phone)
{
	if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){
		return true;
	}else{
		return false;
	}
}
/**
 * 判断时间相差天数
 */
function diffBetweenTwoDays ($day1, $day2)
{
	$second1 = strtotime($day1);
	$second2 = strtotime($day2); 
	if ($second1 < $second2) {
		$tmp = $second2;
		$second2 = $second1;
		$second1 = $tmp;
	}
	return ($second1 - $second2) / 86400;
}

?>