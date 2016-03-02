<?php
function months_ru_1(&$str) {
	$months=array(
		"01"=>"января",
		"02"=>"февраля",
		"03"=>"марта",
		"04"=>"апреля",
		"05"=>"мая",
		"06"=>"июня",
		"07"=>"июля",
		"08"=>"августа",
		"09"=>"сентября",
		"10"=>"октября",
		"11"=>"ноября",
		"12"=>"декабря",
	);
	return $months[$str];
}

//форматирование даты по шаблону на входе "00.00.0000"
//26&nbsp;ноября 2007
function format_date(&$str) {
	$cur_date=explode(".", $str);
	$cur_day=$cur_date[0];
	$cur_month=months_ru_1($cur_date[1]);
	$cur_year=$cur_date[2];
	$str=$cur_day." ".$cur_month." ".$cur_year;
	return $str;
}



if (isset ($_GET['type'])){ 
        switch ($_GET['type']) { 
        case 'pda': 
        setcookie('siteType', 'pda', time()+3600*24*30,'/'); 
        define('siteType','pda'); 
        break;         
        default: 
        setcookie('siteType', 'original', time()+3600*24*30,'/'); 
        define('siteType','original'); 
        } 
} 
else{ 
$checkType=''; 
if (isset($_COOKIE['siteType'])) $checkType=$_COOKIE['siteType']; 
        switch ($checkType) { 
        case 'pda': 
        define('siteType','pda'); 
        break;        
        default: 
        define('siteType',''); 
        } 
}
?>