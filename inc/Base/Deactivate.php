<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc\Base;
class DeActivate
{
	public static function deactivate(){
		
     //flush rewrite rule
    flush_rewrite_rules();
   
   }
}