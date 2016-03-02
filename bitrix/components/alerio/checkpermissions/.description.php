<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arComponentDescription = array(
   "NAME" => GetMessage("COMP_NAME"),
   "DESCRIPTION" => GetMessage("COMP_DESCR"),
   "PATH" => array(
      "ID" => "Alerio-llc",
      "NAME"=> GetMessage("NAME_DIV"),
      "CHILD" => array(
         "ID" => "PublicComponents",
         "NAME" => GetMessage("COMP_DIV")
      )
   ),
   "AREA_BUTTONS" => array(
   ),
   "CACHE_PATH" => "Y",
   "COMPLEX" => "N"
);
?>
