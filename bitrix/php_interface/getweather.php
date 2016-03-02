<?php

$weather="1&nbsp;";
//получаем погоду по rss-каналу с gismeteo
$file = file_get_contents("http://informer.gismeteo.ru/rss/26063.xml");
//меняем кодировку
//$file=iconv("utf-8", "windows-1251",$file);
//разбиваем нашу ленту на item-ы — еденицы информации в потоке
//в массиве $items лежит содержимое каждой единицы информации с гисметео
$weather="2";
preg_match_all("#<item.*?>(.*?)</item>#is", $file, $items);
$weather="3";
//пробегаемся по каждому итему и выдергиваем из него данные, которые нам нужны

foreach($items[1] as $item)
    {
    #получаем заголовок
    preg_match("#<title>(.*?)</title>#is", $item, $title);
    #отрезаем слово "Санкт-Петербург", итак понятно)
    $title = str_replace("Санкт-Петербург: ", "", $title[1]);
    
    #Ищем цифры в заголовке. Это будет дата.
    preg_match("#(\d+)#", $title, $date);
    $date = $date[1];

    #выдергиваем текст описания.
    preg_match("#<description>(.*?)</description>#is", $item, $descr);
    #Отбрасываем все, что за температурой и давлением(ветер и пр.)
    #Если эта информация тоже нужна, то можно убить эту строчку.
    //$descr = str_replace("температура ", "", $descr);
    //$descr = str_replace("давление ", "", $descr);
    $des1 = explode("температура ",$descr[1]);
    $des2 = explode("давление ",$des1[1]);
    $des2[0] = str_replace(", ", "", $des2[0]);
    $des3 = explode(",",$des2[1]);
    $descr = "<font size=\"4\">".$des2[0]."</font>, ".$des3[0];
    #получаем адрес картинки.
    preg_match("#<enclosure url=(['\"])(.*?)\\1#is", $item, $img);
    $img = $img[2];

    #инициализируем поля будущей структуры   
    $dat['title'] = $title;
    $dat['descr'] = $descr;
    $dat['date'] = $date;
    $dat['img'] = $img;
    #добавляем в структуру наши поля
    $data[] = $dat;
    
}


$weather="<img src=\"".$data[0]['img']."\" >".$data[0]['descr'];
echo $weather;
?>