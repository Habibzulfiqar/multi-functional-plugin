<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc\Base;

use \Inc\Base\BaseController;

class settinglinks extends BaseController
{
	public function register()
	{
		add_filter( "plugin_action_links_".$this->plugin, array($this,'settinglinks'));
	}
	public   function settinglinks($links){
     
   //add code settings link
        $settinglinks='<a href="admin.php?page=iqra_plugin">settings</a>';
        array_push($links, $settinglinks);
        return $links;
   }
}