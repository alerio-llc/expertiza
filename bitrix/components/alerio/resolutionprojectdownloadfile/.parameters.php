<? if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

$arComponentParameters = array(

    'PARAMETERS' => array( 

        'BLOCK_URL' => array(

            'NAME' => 'URL',

            'TYPE' => 'STRING',

            'MULTIPLE' => 'N',

            'PARENT' => 'BASE',
            ),
			
		'SET_TITLE' => Array(
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),
        'CACHE_TIME'  =>  array('DEFAULT'=>3600),

    ),

);

?>