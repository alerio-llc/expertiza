<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arComponentDescription = array(

   "NAME" => GetMessage("COMP_NAME"),  /*название компонента*/

   "DESCRIPTION" => GetMessage("COMP_DESCR"), /*описание компонента*/

   "ICON" => "/images/eaddlist.gif", /*путь к иконке компонента от-но папки компонента*/

   "PATH" => array(  /*расположение компонента в дереве компонентов визуального редактора*/

      "ID" => "content", /* код родительской ветки -  Контент */ 

      "CHILD" => array(  /* говорим, что у родительской ветки будет еще потомок */

         "ID" => "helloworld", /* код потомка  */

         "NAME" => GetMessage("COMP_DIV") /* название потомка*/

      )

   ),

   "AREA_BUTTONS" => array( /*пользовательских кнопок, показываемых в режиме редактирования 

сайта, не будет*/

   ),

   "CACHE_PATH" => "Y", /*показывать кнопку очистки кэша копонента в режиме редактирования 

сайта*/

   "COMPLEX" => "N" /*компонент не является комплексным*/

);

?>