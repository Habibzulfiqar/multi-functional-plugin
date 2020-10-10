<?php
/**
* @package IqraFchaudhry
*
*/
namespace Inc\Base;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class WidgetController extends BaseController
{
	public $callbacks;

	public $subpages = array();

	public function register()
	{
		if ( ! $this->activated( 'media_widget' ) ) return;
		$this->settings = new SettingsApi();

       $this->callbacks = new AdminCallbacks();

       $this->setSubpages();

 	}
	 
	public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'habib_plugin',
                'page_title' => 'media widgets',
                'menu_title' => 'widgets', 
                'capability' => 'manage_options', 
                'menu_slug' => 'habib_widget', 
                'callback' => array( $this->callbacks, 'adminWidget' )
            )
           );
    }
}